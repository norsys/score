<?php namespace norsys\score\php\version\major\minor;

use norsys\score\php\{ version, version\number };
use norsys\score\php\string\recipient;

class release
	implements
		version
{
	private
		$major,
		$minor,
		$release
	;

	function __construct(number $major, number $minor, number $release)
	{
		$this->major = $major;
		$this->minor = $minor;
		$this->release = $release;
	}

	function toStringConverterOfMajorNumberInPhpVersionForRecipientIs(recipient $recipient, number\converter\toString $converter) :void
	{
		$converter->recipientOfPhpVersionNumberAsStringIs($this->major, $recipient);
	}

	function toStringConverterOfMinorNumberInPhpVersionForRecipientIs(recipient $recipient, number\converter\toString $converter) :void
	{
		$converter->recipientOfPhpVersionNumberAsStringIs($this->minor, $recipient);
	}

	function toStringConverterOfReleaseNumberInPhpVersionForRecipientIs(recipient $recipient, number\converter\toString $converter) :void
	{
		$converter->recipientOfPhpVersionNumberAsStringIs($this->release, $recipient);
	}
}
