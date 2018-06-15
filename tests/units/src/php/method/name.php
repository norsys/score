<?php namespace norsys\score\tests\units\php\method;

require __DIR__ . '/../../../runner.php';

use norsys\score\tests\units;

class name extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\method\name')
		;
	}
}
