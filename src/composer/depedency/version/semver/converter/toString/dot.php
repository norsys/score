<?php namespace norsys\score\composer\depedency\version\semver\converter\toString;

use norsys\score\{ composer\depedency\version\semver, php };

class dot
	implements
		semver\converter\toString
{
	private
		$integerToStringConverter
	;

	function __construct(php\integer\converter\toString $integerToStringConverter = null)
	{
		$this->integerToStringConverter = $integerToStringConverter ?: new php\integer\converter\toString\identical;
	}

	function recipientOfSemverVersionAsStringIs(semver $semver, php\string\recipient $recipient) :void
	{
		$semver
			->recipientOfMajorNumberInSemverIs(
				new semver\number\recipient\functor(
					function($major) use ($semver, $recipient)
					{
						$semver
							->recipientOfMinorNumberInSemverIs(
								new semver\number\recipient\functor(
									function($minor) use ($major, $semver, $recipient)
									{
										$semver
											->recipientOfPatchNumberInSemverIs(
												new semver\number\recipient\functor(
													function($patch) use ($major, $minor, $recipient)
													{
														$this
															->integerToStringConverter
																->recipientOfPhpIntegerAsStringIs(
																	$major,
																	new php\string\recipient\functor(
																		function($major) use ($minor, $patch, $recipient)
																		{
																			$this
																				->integerToStringConverter
																					->recipientOfPhpIntegerAsStringIs(
																						$minor,
																						new php\string\recipient\functor(
																							function($minor) use ($major, $patch, $recipient)
																							{
																								$this
																									->integerToStringConverter
																										->recipientOfPhpIntegerAsStringIs(
																											$patch,
																											new php\string\recipient\functor(
																												function($patch) use ($major, $minor, $recipient)
																												{
																													$recipient->stringIs($major . '.' . $minor . '.' . $patch);
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
	}
}
