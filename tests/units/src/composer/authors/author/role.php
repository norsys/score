<?php namespace norsys\score\tests\units\composer\authors\author;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;

abstract class role extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\authors\author\role')
		;
	}
}
