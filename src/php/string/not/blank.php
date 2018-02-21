<?php namespace norsys\score\php\string\not;

use norsys\score\php\string\any;

class blank extends any
{
	function __construct(string $string, \exception $exception = null)
	{
		parent::__construct($string);

		if ($string == '')
		{
			throw $exception ?: new \invalidArgumentException('Argument must be a not empty string');
		}
	}
}
