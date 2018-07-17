<?php namespace norsys\score\composer\depedency\version\semver\converter\toString\dot;

use norsys\score\{ composer\depedency\version\semver, php, php\test };

class aggregator extends semver\converter\toString\dot
{
	function recipientOfSemverVersionAsStringIs(semver $version, php\string\recipient $recipient) :void
	{
		$buffer = new php\string\recipient\buffer;

		parent::recipientOfMajorInSemverVersionAsStringIs(
			$version,
			new php\string\recipient\functor(
				function($major) use ($buffer, $version)
				{
					$buffer->stringIs($major);

					parent::recipientOfMinorInSemverVersionAsStringIs(
						$version,
						new php\string\recipient\functor(
							function($minor) use ($buffer, $version)
							{
								(
									new php\string\recipient\prefix\dot($buffer)
								)
									->stringIs($minor)
								;

								parent::recipientOfPatchInSemverVersionAsStringIs(
									$version,
									new php\string\recipient\prefix\dot($buffer)
								);
							}
						)
					);
				}
			)
		);

		$buffer->recipientOfStringIs($recipient);
	}

	private static function semverNumberConverterIs($variable) :semver\number\converter\toString
	{
		return $variable ?: new semver\number\converter\toString\identical;
	}
}
