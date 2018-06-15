<?php namespace norsys\score\tests\units\php;

require __DIR__ . '/../../runner.php';

use norsys\score\tests\units;

abstract class method extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\method')
		;
	}
}
