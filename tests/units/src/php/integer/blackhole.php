<?php namespace norsys\score\tests\units\php\integer;

require __DIR__ . '/../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class blackhole extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\integer\provider')
		;
	}

	function testRecipientOfIntegerIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$recipient = new mockOfScore\php\integer\recipient
			)
			->if(
				$this->testedInstance->recipientOfIntegerIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('integerIs')
						->never
		;
	}
}
