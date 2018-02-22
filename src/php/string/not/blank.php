<?php namespace norsys\score\php\string\not;

use norsys\score\php\{ string\any, test, block };

class blank extends any
{
	function __construct(string $string, \exception $exception = null)
	{
		(
			new test\recipient\exception\fallback(
				new \invalidArgumentException('Argument must be a not empty string'),
				$exception
			)
		)
			->booleanIs($string == '')
		;

		parent::__construct($string);
	}
}
