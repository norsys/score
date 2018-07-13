<?php namespace norsys\score\net\authority\port\converter\toString;

use norsys\score\{
	net\authority\port\converter\toString,
	net\authority\port,
	php\string\recipient
};

class rfc3986
	implements
		toString
{
	function recipientOfPortInUriAsStringIs(port $port, recipient $recipient) :void
	{
		$port
			->recipientOfStringIs(
				$recipient
			)
		;
	}
}
