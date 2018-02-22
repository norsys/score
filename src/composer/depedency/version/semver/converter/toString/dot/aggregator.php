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

	function __construct(php\integer\converter\toString $majorToStringConverter = null, php\integer\converter\toString $minorToStringConverter = null, php\integer\converter\toString $patchToStringConverter = null)
	{
		$this->majorToStringConverter = self::integerConverterIs($majorToStringConverter);
		$this->minorToStringConverter = self::integerConverterIs($minorToStringConverter);
		$this->patchToStringConverter = self::integerConverterIs($patchToStringConverter);
	}

	function recipientOfSemverVersionAsStringIs(semver $version, php\string\recipient $recipient) :void
	{
		$buffer = null;

		$version
			->recipientOfMajorNumberInSemverIs(
				new semver\number\recipient\functor(
					function($major) use (& $buffer, $version)
					{
						$this->majorToStringConverter
							->recipientOfPhpIntegerAsStringIs(
								$major,
								new php\string\recipient\functor(
									function($major) use (& $buffer, $version)
									{
										$buffer .= $major;

										$version
											->recipientOfMinorNumberInSemverIs(
												new semver\number\recipient\functor(
													function($minor) use (& $buffer, $version)
													{
														$this->minorToStringConverter
															->recipientOfPhpIntegerAsStringIs(
																$minor,
																new php\string\recipient\functor(
																	function($minor) use (& $buffer, $version)
																	{
																		$buffer .= '.' . $minor;

																		$version
																			->recipientOfPatchNumberInSemverIs(
																				new semver\number\recipient\functor(
																					function($patch) use (& $buffer)
																					{
																						$this->patchToStringConverter
																							->recipientOfPhpIntegerAsStringIs(
																								$patch,
																								new php\string\recipient\functor(
																									function($patch) use (& $buffer)
																									{
																										$buffer .= '.' . $patch;
																									}
																								)
																							)
																						;
																					}
																				)
																			)
																		;
																	}
																)
															)
														;
													}
												)
											)
										;
									}
								)
							)
						;
					}
				)
			)
		;

		(new test\defined)
			->recipientOfTestOnVariableIs(
				$buffer,
				new test\recipient\ifTrue\functor(
					function() use ($buffer, $recipient)
					{
						$recipient->stringIs($buffer);
					}
				)
			)
		;
	}

	private static function integerConverterIs($variable) :php\integer\converter\toString
	{
		return $variable ?: new php\integer\converter\toString\identical;
	}
}
