<?php namespace norsys\score\tests\units\composer\autoload\classmap;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;

abstract class path extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\autoload\classmap\path')
		;
	}
}
