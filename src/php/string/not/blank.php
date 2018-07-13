<?php namespace norsys\score\php\string\not;

use norsys\score\{ php, php\string\any, php\test, php\block };

class blank extends any
{
	function __construct(string $string, \exception $exception = null)
	{
		(
			new php\string\test\isEmpty($string)
		)
			->recipientOfTestIs(
				new test\recipient\ifTrue\exception\fallback(
					new \invalidArgumentException('Argument must be a not empty string'),
					$exception
				)
			)
		;

		parent::__construct($string);
	}
}
