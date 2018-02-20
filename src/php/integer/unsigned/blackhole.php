<?php namespace norsys\score\php\integer\unsigned;

use norsys\score\php;

class blackhole extends php\integer\blackhole
	implements
		php\integer\unsigned
{
	function recipientOfUnsignedIntegerIs(php\integer\unsigned\recipient $recipient) :void
	{
	}
}
