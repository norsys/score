<?php namespace norsys\score\php\test\recipient\exception;

use norsys\score\php\test\recipient\ifTrue\exception;

class fallback extends exception
{
	function __construct(\exception $default, \exception $exception = null)
	{
		parent::__construct($exception ?: $default);
	}
}
