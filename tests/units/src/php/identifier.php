<?php namespace norsys\score\tests\units\php;

require __DIR__ . '/../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

// http://php.net/manual/en/language.variables.basics.php
//
abstract class identifier extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\identifier')
		;
	}
}
