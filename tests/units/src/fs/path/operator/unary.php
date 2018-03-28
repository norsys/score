<?php namespace norsys\score\tests\units\fs\path\operator;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;

abstract class unary extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\fs\path\operator\unary')
		;
	}
}
