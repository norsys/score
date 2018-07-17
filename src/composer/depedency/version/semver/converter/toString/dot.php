<?php namespace norsys\score\composer\depedency\version\semver\converter\toString;

use norsys\score\{ trampoline, composer\depedency\version\semver, php };

class dot
	implements
		semver\converter\toString
{
	private
		$majorToString,
		$minorToString,
		$patchToString
	;

	function __construct(semver\number\converter\toString $majorToString = null, semver\number\converter\toString $minorToString = null, semver\number\converter\toString $patchToString = null)
	{
		$this->majorToString = $majorToString ?: new semver\number\converter\toString\identical;
		$this->minorToString = $minorToString ?: new semver\number\converter\toString\identical;
		$this->patchToString = $patchToString ?: new semver\number\converter\toString\identical;
	}

	function recipientOfMajorInSemverVersionAsStringIs(semver $semver, php\string\recipient $recipient) :void
	{
		$semver
			->recipientOfMajorNumberAsStringFromConverterIs(
				$this->majorToString,
				$recipient
			)
		;
	}

	function recipientOfMinorInSemverVersionAsStringIs(semver $semver, php\string\recipient $recipient) :void
	{
		$semver
			->recipientOfMinorNumberAsStringFromConverterIs(
				$this->minorToString,
				$recipient
			)
		;
	}

	function recipientOfPatchInSemverVersionAsStringIs(semver $semver, php\string\recipient $recipient) :void
	{
		$semver
			->recipientOfPatchNumberAsStringFromConverterIs(
				$this->patchToString,
				$recipient
			)
		;
	}

	function recipientOfSemverVersionAsStringIs(semver $semver, php\string\recipient $recipient) :void
	{
		(
			new trampoline\container\fifo(
				new trampoline\functor(
					function($block) use ($semver)
					{
						$this
							->recipientOfMajorInSemverVersionAsStringIs(
								$semver,
								new php\string\recipient\block($block)
							)
						;
					}
				),
				new trampoline\functor(
					function($block) use ($semver)
					{
						$this
							->recipientOfMinorInSemverVersionAsStringIs(
								$semver,
								new php\string\recipient\block($block)
							)
						;
					}
				),
				new trampoline\functor(
					function($block) use ($semver)
					{
						$this
							->recipientOfPatchInSemverVersionAsStringIs(
								$semver,
								new php\string\recipient\block($block)
							)
						;
					}
				)
			)
		)
			->argumentsForBlockAre(
				new php\block\functor(
					function($recipient, $major, $minor, $patch)
					{
						(
							new php\string\operator\unary\join(
								$major,
								$minor,
								$patch
							)
						)
							->recipientOfStringOperationWithStringIs(
								'.',
								$recipient
							)
						;
					}
				),
				$recipient
			)
		;
	}
}
