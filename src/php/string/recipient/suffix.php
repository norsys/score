<?php namespace norsys\score\php\string\recipient;

use norsys\score\php;

class suffix
	implements
		php\string\recipient
{
	function __construct(string $suffix, php\string\recipient $recipient)
	{
		$this->suffix = $suffix;
		$this->recipient = $recipient;
	}

	function stringIs(string $string) :void
	{
		(new php\string\recipient\prefix($string, $this->recipient))->stringIs($this->suffix);
	}
}
