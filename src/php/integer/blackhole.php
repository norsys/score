<?php namespace norsys\score\php\integer;

use norsys\score\php;

class blackhole
	implements
		php\integer\provider
{
	function recipientOfStringIs(php\string\recipient $recipient) :void
	{
	}

	function recipientOfIntegerIs(php\integer\recipient $recipient) :void
	{
	}
}
