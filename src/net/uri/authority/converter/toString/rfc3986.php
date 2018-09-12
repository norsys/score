<?php namespace norsys\score\net\uri\authority\converter\toString;

use norsys\score\{
	net\port,
	net\uri\authority,
	net\uri\authority\converter\toString,
	php\string\recipient
};

class rfc3986
	implements
		toString
{
	function recipientOfUriAuthorityAsStringIs(authority $authority, recipient $recipient) :void
	{
		$authority
			->recipientOfHostInUriAuthorityAsStringFromConverterIs(
				new authority\host\converter\toString\rfc3986,
				new recipient\functor(
					function($host) use ($authority, $recipient)
					{
						$buffer = new recipient\buffer;

						$authority
							->recipientOfUserInfoInUriAuthorityAsStringFromConverterIs(
								new authority\user\info\converter\toString\rfc3986,
								new recipient\suffix('@', $buffer)
							)
						;

						$buffer->stringIs($host);

						$authority
							->recipientOfPortInUriAuthorityAsStringFromConverterIs(
								new port\converter\toString\rfc3986,
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
