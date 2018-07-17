<?php namespace norsys\score\net\uri\authority\host\tld;

use norsys\score\{
	net\uri\authority\host,
	php\string\recipient
};

class fr
	implements
		host
{
	function recipientOfStringIs(recipient $recipient) :void
	{
		$recipient->stringIs('fr');
	}
}
