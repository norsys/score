<?php namespace norsys\score\composer\depedency\version\semver;

use norsys\score\{ composer\depedency\version\semver, php };

class any
	implements
		semver
{
	private
		$major,
		$minor,
		$patch,
		$semverToStringConverter
	;

	function __construct(semver\number $major = null, semver\number $minor = null, semver\number $patch = null, semver\converter\toString $semverToStringConverter = null)
	{
		$this->major = self::numberIs($major);
		$this->minor = self::numberIs($minor);
		$this->patch = self::numberIs($patch);
		$this->semverToStringConverter = $semverToStringConverter ?: new semver\converter\toString\dot\aggregator;
	}

	function recipientOfMajorNumberInSemverIs(semver\number\recipient $recipient) :void
	{
		$recipient->semverVersionNumberIs($this->major);
	}

	function recipientOfMajorNumberAsStringFromConverterIs(semver\number\converter\toString $converter, php\string\recipient $recipient) :void
	{
		$converter->recipientOfSemverNumberAsStringIs($this->major, $recipient);
	}

	function recipientOfMinorNumberInSemverIs(semver\number\recipient $recipient) :void
	{
		$recipient->semverVersionNumberIs($this->minor);
	}

	function recipientOfMinorNumberAsStringFromConverterIs(semver\number\converter\toString $converter, php\string\recipient $recipient) :void
	{
		$converter->recipientOfSemverNumberAsStringIs($this->minor, $recipient);
	}

	function recipientOfPatchNumberInSemverIs(semver\number\recipient $recipient) :void
	{
		$recipient->semverVersionNumberIs($this->patch);
	}

	function recipientOfPatchNumberAsStringFromConverterIs(semver\number\converter\toString $converter, php\string\recipient $recipient) :void
	{
		$converter->recipientOfSemverNumberAsStringIs($this->patch, $recipient);
	}

	function recipientOfStringIs(php\string\recipient $recipient) :void
	{
		$this->semverToStringConverter
			->recipientOfSemverVersionAsStringIs(
				$this,
				$recipient
			)
		;
	}

	private static function numberIs($variable)
	{
		return $variable ?: new semver\number\any;
	}
}
