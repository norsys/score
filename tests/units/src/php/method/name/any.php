<?php namespace norsys\score\tests\units\php\method\name;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class any extends units\php\identifier\any
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\method\name')
		;
	}
}
