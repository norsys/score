<?php namespace norsys\score\composer\depedency\version\semver\converter\toString;

use norsys\score\{ composer\depedency\version\semver, php\integer\converter\toString, php };

class dot
	implements
		semver\converter\toString
{
	private
		$majorToString,
		$minorToString,
		$patchToString
	;

	function __construct(toString $majorToString = null, toString $minorToString = null, toString $patchToString = null)
	{
		$this->majorToString = $majorToString ?: new toString\identical;
		$this->minorToString = $minorToString ?: new toString\identical;
		$this->patchToString = $patchToString ?: new toString\identical;
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
															->majorToString
																->recipientOfPhpIntegerAsStringIs(
																	$major,
																	new php\string\recipient\functor(
																		function($major) use ($minor, $patch, $recipient)
																		{
																			$this
																				->minorToString
																					->recipientOfPhpIntegerAsStringIs(
																						$minor,
																						new php\string\recipient\functor(
																							function($minor) use ($major, $patch, $recipient)
																							{
																								$this
																									->patchToString
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
