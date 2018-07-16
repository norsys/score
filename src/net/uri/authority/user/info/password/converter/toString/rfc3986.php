<?php namespace norsys\score\net\uri\authority\user\info\password\converter\toString;

use norsys\score\{
	net\uri\authority\user\info\password\converter\toString,
	net\uri\authority\user\info\password,
	php\string\recipient
};

class rfc3986
	implements
		toString
{
	function recipientOfPasswordInUriAuthorityAsStringIs(password $password, recipient $recipient) :void
	{
		$password
			->recipientOfStringIs($recipient)
		;
	}
}
