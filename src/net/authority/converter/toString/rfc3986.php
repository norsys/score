<?php namespace norsys\score\net\authority\converter\toString;

use norsys\score\{
	net\authority,
	net\authority\converter\toString,
	php\string\recipient
};

class rfc3986
	implements
		toString
{
	function recipientOfUriAuthorityAsStringIs(authority $authority, recipient $recipient) :void
	{
		$authority
			->recipientOfHostInUriFromToStringConverterIs(
				new authority\host\converter\toString\rfc3986,
				new recipient\functor(
					function($host) use ($authority, $recipient)
					{
						$buffer = new recipient\buffer;

						$authority
							->recipientOfUserInfoInUriFromToStringConverterIs(
								new authority\user\info\converter\toString\rfc3986,
								new recipient\suffix('@', $buffer)
							)
						;

						$buffer->stringIs($host);

						$authority
							->recipientOfPortInUriFromToStringConverterIs(
								new authority\port\converter\toString\rfc3986,
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
