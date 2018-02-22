<?php namespace norsys\score\php\block\forwarder\string;

use norsys\score\{ php\block, php };

class recipient
	implements
		block
{
	private
		$string,
		$recipient
	;

	function __construct(string $string, php\string\recipient $recipient)
	{
		$this->string = $string;
		$this->recipient = $recipient;
	}

	function blockArgumentsAre(... $arguments) :void
	{
		$this->recipient->stringIs($this->string);
	}
}
