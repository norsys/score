<?php namespace norsys\score\php\integer\converter\toString;

use norsys\score\{ php\integer\converter\toString, php };

class any
	implements
		toString
{
	private
		$string
	;

	function __construct(string $string)
	{
		$this->string = $string;
	}

	function recipientOfPhpIntegerAsStringIs(php\integer\provider $integer, php\string\recipient $recipient) :void
	{
		$recipient->stringIs($this->string);
	}
}
