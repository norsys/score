<?php namespace norsys\score\php\string\recipient;

use norsys\score\php;

class prefix
	implements
		php\string\recipient
{
	private
		$prefix,
		$recipient
	;

	function __construct(string $prefix, php\string\recipient $recipient)
	{
		$this->prefix = $prefix;
		$this->recipient = $recipient;
	}

	function stringIs(string $string) :void
	{
		$this->recipient->stringIs($this->prefix . $string);
	}
}
