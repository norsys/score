<?php namespace norsys\score\php\string\recipient;

use norsys\score\php\string\recipient;

class utf8
	implements
		recipient
{
	private
		$recipient
	;

	function __construct(recipient $recipient)
	{
		$this->recipient = $recipient;
	}

	function stringIs(string $string) :void
	{
		$this->recipient->stringIs(utf8_encode($string));
	}
}
