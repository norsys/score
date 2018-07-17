<?php namespace norsys\score\net\uri\authority\port;

use norsys\score\{
	net\uri\authority\port,
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
