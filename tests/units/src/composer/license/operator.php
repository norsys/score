<?php namespace norsys\score\tests\units\composer\license;

require __DIR__ . '/../../../runner.php';

use norsys\score\tests\units;

abstract class operator extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\license\operator')
		;
	}
}
