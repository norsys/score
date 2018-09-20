<?php namespace norsys\score\net\uri\path\segment\converter\toString;

use norsys\score\{
	net\uri\path\segment\converter\toString,
	net\uri\path\segment,
	php\string\recipient
};

class rfc3986
	implements
		toString
{
	function recipientOfSegmentInNetUriPathAsStringIs(segment $segment, recipient $recipient) :void
	{
		$segment
			->recipientOfStringIs(
				new recipient\prefix('/', $recipient)
			)
		;
	}
}
