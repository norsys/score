<?php namespace norsys\score\composer\depedency\version\semver\converter\toString\dot\major;

use norsys\score\{ composer\depedency\version\semver\converter\toString, php, composer\depedency\version\semver };

class wildcard
	implements
		toString
{
	private
		$integerToStringConverter
	;

	function __construct(php\integer\converter\toString $integerToStringConverter = null)
	{
		$this->integerToStringConverter = $integerToStringConverter ?: new php\integer\converter\toString\identical;
	}

	function recipientOfSemverVersionAsStringIs(semver $version, php\string\recipient $recipient) :void
	{
		$version
			->recipientOfMajorNumberInSemverIs(
				new semver\number\recipient\functor(
					function($major) use ($recipient)
					{
						$this->integerToStringConverter
							->recipientOfPhpIntegerAsStringIs(
								$major,
								new php\string\recipient\functor(
									function($major) use ($recipient)
									{
										$recipient->stringIs($major . '.*');
									}
								)
							)
						;
					}
				)
			)
		;
	}
}
