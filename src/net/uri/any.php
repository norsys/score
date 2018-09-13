<?php namespace norsys\score\net\uri;

use norsys\score\net\uri;
use norsys\score\php\string\recipient;

class any
	implements
		uri
{
	function recipientOfUriAsStringFromConverterIs(uri\converter\toString $converter, recipient $recipient) :void
	{
	}
}
