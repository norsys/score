<?php namespace norsys\score\php\string;

class any
	implements
		provider
{
	private
		$string
	;

	function __construct(string $string)
	{
		$this->string = $string;
	}

	function recipientOfStringIs(recipient $recipient) :void
	{
		$recipient->stringIs($this->string);
	}
}
