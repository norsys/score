<?php namespace norsys\score\net\uri\authority\user\info\converter\toString;

use norsys\score\{
	net\uri\authority\user\info\converter\toString,
	net\uri\authority\user\info\user,
	net\uri\authority\user\info\password,
	net\uri\authority,
	php\string\recipient
};

class rfc3986
	implements
		toString
{
	function recipientOfUserInfoInUriAuthorityAsStringIs(authority\user\info $userInfo, recipient $recipient) :void
	{
		$userInfo
			->recipientOfUserInUriAuthorityAsStringFromConverterIs(
				new user\converter\toString\rfc3986,
				new recipient\functor(
					function($user) use ($userInfo, $recipient)
					{
						$buffer = new recipient\buffer($user);

						$userInfo
							->recipientOfPasswordInUriAuthorityAsStringFromConverterIs(
								new password\converter\toString\rfc3986,
								new recipient\prefix(':', $buffer)
							)
						;

						$buffer->recipientOfStringIs($recipient);
					}
				)
			)
		;
	}
}
