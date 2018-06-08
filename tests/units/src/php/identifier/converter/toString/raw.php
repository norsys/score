<?php namespace norsys\score\tests\units\php\identifier\converter\toString;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;

class raw extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\identifier\converter\toString')
		;
	}
}
