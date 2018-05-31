<?php namespace norsys\score\php;

use norsys\score\php\string\recipient;

interface version
{
	function toStringConverterOfMajorNumberInPhpVersionForRecipientIs(recipient $recipient, version\number\converter\toString $converter) :void;
	function toStringConverterOfMinorNumberInPhpVersionForRecipientIs(recipient $recipient, version\number\converter\toString $converter) :void;
	function toStringConverterOfReleaseNumberInPhpVersionForRecipientIs(recipient $recipient, version\number\converter\toString $converter) :void;
}
