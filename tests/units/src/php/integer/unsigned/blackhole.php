<?php namespace norsys\score\tests\units\php\integer\unsigned;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class blackhole extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\integer\unsigned')
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

	function testRecipientOfUnsignedIntegerIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$recipient = new mockOfScore\php\integer\unsigned\recipient
			)
			->if(
				$this->testedInstance->recipientOfUnsignedIntegerIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('unsignedIntegerIs')
						->never
		;
	}
}
