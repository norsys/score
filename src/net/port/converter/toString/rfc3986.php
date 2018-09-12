<?php namespace norsys\score\net\port\converter\toString;

use norsys\score\{
	net\port\converter\toString,
	net\port,
	php\string\recipient
};

class rfc3986
	implements
		toString
{
	function recipientOfPortInUriAuthorityAsStringIs(port $port, recipient $recipient) :void
	{
		$port
			->recipientOfStringIs(
				$recipient
			)
		;
	}
}
