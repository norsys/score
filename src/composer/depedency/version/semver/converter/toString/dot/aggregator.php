<?php namespace norsys\score\composer\depedency\version\semver\converter\toString\dot;

use norsys\score\{ composer\depedency\version\semver, php, php\test };

class aggregator
	implements
		semver\converter\toString
{
	private
		$majorToStringConverter,
		$minorToStringConverter,
		$patchToStringConverter
	;

	function __construct(semver\number\converter\toString $majorToStringConverter = null, semver\number\converter\toString $minorToStringConverter = null, semver\number\converter\toString $patchToStringConverter = null)
	{
		$this->majorToStringConverter = self::semverNumberConverterIs($majorToStringConverter);
		$this->minorToStringConverter = self::semverNumberConverterIs($minorToStringConverter);
		$this->patchToStringConverter = self::semverNumberConverterIs($patchToStringConverter);
	}

	function recipientOfSemverVersionAsStringIs(semver $version, php\string\recipient $recipient) :void
	{
		$buffer = new php\string\recipient\buffer;

		$version
			->recipientOfMajorNumberAsStringFromConverterIs(
				$this->majorToStringConverter,
				new php\string\recipient\fifo(
					$buffer,
					new php\string\recipient\functor(
						function() use ($buffer, $version)
						{
							$version
								->recipientOfMinorNumberAsStringFromConverterIs(
									$this->minorToStringConverter,
									new php\string\recipient\fifo(
										new php\string\recipient\prefix('.', $buffer),
										new php\string\recipient\functor(
											function() use ($buffer, $version)
											{
												$version
													->recipientOfPatchNumberAsStringFromConverterIs(
														$this->patchToStringConverter,
														new php\string\recipient\prefix('.', $buffer)
													)
												;
											}
										)
									)
								)
							;
						}
					)
				)
			)
		;

		$buffer->recipientOfStringIs($recipient);
	}

	private static function semverNumberConverterIs($variable) :semver\number\converter\toString
	{
		return $variable ?: new semver\number\converter\toString\identical;
	}
}
