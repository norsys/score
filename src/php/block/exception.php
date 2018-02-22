<?php namespace norsys\score\php\block;

use norsys\score\php\block;

class exception
	implements
		block
{
	private
		$exception
	;

	function __construct(\exception $exception)
	{
		$this->exception = $exception;
	}

	function blockArgumentsAre(... $arguments) :void
	{
		throw $this->exception;
	}
}
