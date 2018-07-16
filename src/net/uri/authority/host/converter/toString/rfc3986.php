<?php namespace norsys\score\net\uri\authority\host\converter\toString;

use norsys\score\{
	net\uri\authority\host\converter\toString,
	net\uri\authority\host,
	php\string\recipient
};

class rfc3986
	implements
		toString
{
	function recipientOfHostInUriAuthorityAsStringIs(host $host, recipient $recipient) :void
	{
		$host->recipientOfStringIs($recipient);
	}
}
