<?php namespace norsys\score\net\uri\path\converter\toString;

use norsys\score\{
	net\uri\path,
	net\uri\path\converter\toString,
	php\string\recipient,
	php\string\buffer
};

class rfc3986
	implements
		toString
{
	function recipientOfNetUriPathAsStringIs(path $path, recipient $recipient) :void
	{
		$buffer = new recipient\buffer(new buffer\infinite);

		$path
			->recipientOfSegmentInNetUriPathAsStringFromConverterIs(
				new path\segment\converter\toString\rfc3986,
				$buffer
			)
		;

		$buffer->recipientOfStringIs($recipient);
	}
}
