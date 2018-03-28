<?php namespace norsys\score\tests\units\fs;

require __DIR__ . '/../../runner.php';

use norsys\score\tests\units;

class path extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\fs\path')
		;
	}
}
