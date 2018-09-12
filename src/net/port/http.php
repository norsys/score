<?php namespace norsys\score\net\port;

use norsys\score\{
	net\port,
	php
};

class http
	implements
		port
{
	function recipientOfStringIs(php\string\recipient $recipient) :void
	{
		$recipient->stringIs('80');
	}

	function recipientOfIntegerIs(php\integer\recipient $recipient) :void
	{
		$recipient->integerIs(80);
	}

	function recipientOfUnsignedIntegeris(php\integer\unsigned\recipient $recipient) :void
	{
		$recipient->unsignedIntegerIs(80);
	}
}
