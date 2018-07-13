<?php namespace norsys\score\php\string;

use norsys\score\php;

interface regex
{
	function recipientOfRegexMatchingAgainstStringIs(string $string, php\test\recipient $recipient) :void;
}
