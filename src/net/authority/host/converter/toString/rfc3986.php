<?php namespace norsys\score\net\authority\host\converter\toString;

use norsys\score\{
	net\authority\host\converter\toString,
	net\authority\host,
	php\string\recipient
};

class rfc3986
	implements
		toString
{
	function recipientOfHostInUriAsStringIs(host $host, recipient $recipient) :void
	{
		$host->recipientOfStringIs($recipient);
	}
}
