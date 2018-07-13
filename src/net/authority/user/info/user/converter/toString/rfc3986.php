<?php namespace norsys\score\net\authority\user\info\user\converter\toString;

use norsys\score\{
	net\authority\user\info\user\converter\toString,
	net\authority\user\info\user,
	php\string\recipient
};

class rfc3986
	implements
		toString
{
	function recipientOfUserInUriAsStringIs(user $user, recipient $recipient) :void
	{
		$user
			->recipientOfStringIs($recipient)
		;
	}
}
