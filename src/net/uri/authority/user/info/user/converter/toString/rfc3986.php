<?php namespace norsys\score\net\uri\authority\user\info\user\converter\toString;

use norsys\score\{
	net\uri\authority\user\info\user\converter\toString,
	net\uri\authority\user\info\user,
	php\string\recipient
};

class rfc3986
	implements
		toString
{
	function recipientOfUserInUriAuthorityAsStringIs(user $user, recipient $recipient) :void
	{
		$user
			->recipientOfStringIs($recipient)
		;
	}
}
