<?php namespace norsys\score\net\uri\authority\port\converter\toString;

use norsys\score\{
	net\uri\authority\port\converter\toString,
	net\uri\authority\port,
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
