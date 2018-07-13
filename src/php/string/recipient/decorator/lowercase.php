<?php namespace norsys\score\php\string\recipient\decorator;

use norsys\score\php\string\recipient;

class lowercase
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
		$this->recipient
			->stringIs(strtolower($string))
		;
	}
}
