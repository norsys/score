<?php namespace norsys\score\tests\units\php;

require __DIR__ . '/../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

abstract class aNamespace extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\aNamespace')
		;
	}

	abstract function testRecipientOfIdentifierFromToStringConverterIs();
}
