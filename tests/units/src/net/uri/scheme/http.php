<?php namespace norsys\score\tests\units\net\uri\scheme;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class http extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\net\uri\scheme')
		;
	}

	function testRecipientOfString()
	{
		$this
			->given(
				$this->newTestedInstance,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->withArguments('http')
							->once
		;
	}
}
