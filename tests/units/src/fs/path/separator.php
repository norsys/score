<?php namespace norsys\score\tests\units\fs\path;

require __DIR__ . '/../../../runner.php';

use norsys\score\tests\units;

abstract class separator extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\fs\path\separator')
		;
	}
}
