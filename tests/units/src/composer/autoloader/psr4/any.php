<?php namespace norsys\score\tests\units\composer\autoloader\psr4;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\autoloader')
			->implements('norsys\score\composer\autoloader\psr4')
		;
	}
}
