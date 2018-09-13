<?php namespace norsys\score\tests\units\net\uri;

require __DIR__ . '/../../../runner.php';

use norsys\score\tests\units;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\net\uri')
		;
	}
}
