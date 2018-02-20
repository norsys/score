<?php namespace norsys\score\php\string\not;

use norsys\score\php\string\any;

class blank extends any
{
	function __construct(string $string)
	{
		parent::__construct($string);

		if ($string == '')
		{
			throw new \invalidArgumentException('Argument must be a not empty string');
		}
	}
}
