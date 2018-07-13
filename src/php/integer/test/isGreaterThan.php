<?php namespace norsys\score\php\integer\test;

use norsys\score\php\test;

class isGreaterThan extends test\variable\any
{
	function __construct(int $integer, int $reference)
	{
		parent::__construct($integer, new test\isGreaterThan($reference));
	}
}
