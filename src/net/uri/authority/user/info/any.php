<?php namespace norsys\score\net\uri\authority\user\info;

use norsys\score\{
	net\uri\authority\user,
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

	function recipientOfUserInUriAuthorityAsStringFromConverterIs(user\info\user\converter\toString $converter, recipient $recipient) :void
	{
		$converter->recipientOfUserInUriAuthorityAsStringIs($this->user, $recipient);
	}

	function recipientOfPasswordInUriAuthorityAsStringFromConverterIs(user\info\password\converter\toString $converter, recipient $recipient) :void
	{
		$converter->recipientOfPasswordInUriAuthorityAsStringIs($this->password, $recipient);
	}
}
