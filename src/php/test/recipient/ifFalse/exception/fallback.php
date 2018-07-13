<?php namespace norsys\score\php\test\recipient\ifFalse\exception;

use norsys\score\php\test\recipient;

class fallback extends recipient\not
{
	function __construct(\exception $default, \exception $exception = null)
	{
		parent::__construct(new recipient\ifTrue\exception\fallback($exception ?: $default));
	}
}
