<?php namespace norsys\score\php\integer;

use norsys\score\php;

class any
	implements
		php\integer\provider
{
	private
		$integer
	;

	function __construct(int $integer)
	{
		$this->integer = $integer;
	}

	function recipientOfStringIs(php\string\recipient $recipient) :void
	{
		$recipient->stringIs($this->integer);
	}

	function recipientOfIntegerIs(php\integer\recipient $recipient) :void
	{
		$recipient->integerIs($this->integer);
	}
}
