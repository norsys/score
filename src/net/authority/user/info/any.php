<?php namespace norsys\score\net\authority\user\info;

use norsys\score\{
	net\authority\user,
	php\string\recipient
};

class any
	implements
		user\info
{
	private
		$user,
		$password
	;

	function __construct(user\info\user $user, user\info\password $password)
	{
		$this->user = $user;
		$this->password = $password;
	}

	function recipientOfUserInUriFromToStringConverterIs(user\info\user\converter\toString $converter, recipient $recipient) :void
	{
		$converter->recipientOfUserInUriAsStringIs($this->user, $recipient);
	}

	function recipientOfPasswordInUriFromToStringConverterIs(user\info\password\converter\toString $converter, recipient $recipient) :void
	{
		$converter->recipientOfPasswordInUriAsStringIs($this->password, $recipient);
	}
}
