<?php namespace norsys\score\net\host\converter\toString;

use norsys\score\{
	net\host\converter\toString,
	net\host,
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
