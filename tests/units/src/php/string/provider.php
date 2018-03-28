<?php namespace norsys\score\tests\units\php\string;

require __DIR__ . '/../../../runner.php';

use norsys\score\tests\units;

abstract class provider extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\string\provider')
		;
	}
}
