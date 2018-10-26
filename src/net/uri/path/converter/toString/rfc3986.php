<?php namespace norsys\score\net\uri\path\converter\toString;

use norsys\score\{
	net\uri\path,
	net\uri\path\converter\toString,
	php\string\recipient,
	php\string\provider,
	php\string\buffer
};

class rfc3986
	implements
		toString
{
	function recipientOfNetUriPathAsStringIs(path $path, recipient $recipient) :void
	{
		(
			new buffer\infinite
		)
			->recipientOfStringFromProviderIs(
				new provider\functor(
					function($recipient) use ($path)
					{
						$path
							->recipientOfSegmentInNetUriPathAsStringFromConverterIs(
								new path\segment\converter\toString\rfc3986,
								$recipient
							)
						;
					}
				),
				$recipient
			)
		;
	}
}
