<?php namespace norsys\score\composer\depedency\version\semver;

use norsys\score\{ composer\depedency\version\semver, php };

class prefixed
	implements
		semver
{
	private
		$semver
	;

	function __construct(semver $semver)
	{
		$this->semver = $semver;
	}

	function recipientOfMajorNumberInSemverIs(semver\number\recipient $recipient) :void
	{
		$this->semver->recipientOfMajorNumberInSemverIs($recipient);
	}

	function recipientOfMajorNumberAsStringFromConverterIs(semver\number\converter\toString $converter, php\string\recipient $recipient) :void
	{
		$this->semver->recipientOfMajorNumberAsStringFromConverterIs($converter, $recipient);
	}

	function recipientOfMinorNumberInSemverIs(semver\number\recipient $recipient) :void
	{
		$this->semver->recipientOfMinorNumberInSemverIs($recipient);
	}

	function recipientOfMinorNumberAsStringFromConverterIs(semver\number\converter\toString $converter, php\string\recipient $recipient) :void
	{
		$this->semver->recipientOfMinorNumberAsStringFromConverterIs($converter, $recipient);
	}

	function recipientOfPatchNumberInSemverIs(semver\number\recipient $recipient) :void
	{
		$this->semver->recipientOfPatchNumberInSemverIs($recipient);
	}

	function recipientOfPatchNumberAsStringFromConverterIs(semver\number\converter\toString $converter, php\string\recipient $recipient) :void
	{
		$this->semver->recipientOfPatchNumberAsStringFromConverterIs($converter, $recipient);
	}

	function recipientOfStringIs(php\string\recipient $recipient) :void
	{
		$this->semver
			->recipientOfStringIs(
				new php\string\recipient\prefix('v', $recipient)
			)
		;
	}
}
