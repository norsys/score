<?php namespace norsys\score\php\string\operator\unary;

use norsys\score\php;

class join
{
	private
		$strings
	;

	function __construct(string... $strings)
	{
		$this->strings = $strings;
	}

	function recipientOfStringOperationWithStringIs(string $glue, php\string\recipient $recipient)
	{
		$recipient->stringIs(join($glue, $this->strings));
	}
}
