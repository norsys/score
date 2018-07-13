<?php namespace norsys\score\net\authority\user\info\password\converter\toString;

use norsys\score\{
	net\authority\user\info\password\converter\toString,
	net\authority\user\info\password,
	php\string\recipient
};

class rfc3986
	implements
		toString
{
	function recipientOfPasswordInUriAsStringIs(password $password, recipient $recipient) :void
	{
		$password
			->recipientOfStringIs($recipient)
		;
	}
}
