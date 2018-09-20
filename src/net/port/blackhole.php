<?php namespace norsys\score\net\port;

use norsys\score\{
	php,
	net\port
};

class blackhole
	implements
		port
{
	function recipientOfUnsignedIntegerIs(php\integer\unsigned\recipient $recipient) :void
	{
	}

	function recipientOfIntegerIs(php\integer\recipient $recipient) :void
	{
	}

	function recipientOfStringIs(php\string\recipient $recipient) :void
	{
	}
}
