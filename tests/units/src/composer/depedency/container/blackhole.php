<?php namespace norsys\score\tests\units\composer\depedency\container;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;

class blackhole extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\depedency\container')
		;
	}
}
