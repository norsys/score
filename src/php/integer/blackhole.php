<?php namespace norsys\score\php\integer;

use norsys\score\php\integer;

class blackhole
	implements
		integer\provider
{
	function recipientOfIntegerIs(integer\recipient $recipient) :void
	{
	}
}
