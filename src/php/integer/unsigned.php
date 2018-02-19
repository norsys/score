<?php namespace norsys\score\php\integer;

use norsys\score\php;

interface unsigned extends php\integer\provider
{
	function recipientOfUnsignedIntegerIs(unsigned\recipient $recipient) :void;
}
