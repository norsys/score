<?php namespace norsys\score\php\string\test;

use norsys\score\php\test;

class isEmpty extends test\variable\any
{
	function __construct(string $string)
	{
		parent::__construct($string, new test\equal\strictly(''));
	}
}
