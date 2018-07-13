<?php namespace norsys\score\net\authority\user\info\converter\toString;

use norsys\score\{
	net\authority\user\info\converter\toString,
	net\authority\user\info\user,
	net\authority\user\info\password,
	net\authority,
	php\string\recipient,
	php\string\test,
	php\test\recipient\ifTrue
};

class rfc3986
	implements
		toString
{
	function recipientOfUserInfoInUriAsStringIs(authority\user\info $userInfo, recipient $recipient) :void
	{

		$userInfo
			->recipientOfUserInUriFromToStringConverterIs(
				new user\converter\toString\rfc3986,
				new recipient\functor(
					function($user) use ($userInfo, $recipient)
					{
						$buffer = new recipient\buffer($user);

						$userInfo
							->recipientOfPasswordInUriFromToStringConverterIs(
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
