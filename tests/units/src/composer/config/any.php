<?php namespace norsys\score\tests\units\composer\config;

require __DIR__ . '/../../../runner.php';

use norsys\score\{ tests\units, composer };
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\config')
		;
	}
}
