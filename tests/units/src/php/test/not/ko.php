<?php namespace norsys\score\tests\units\php\test\isNotFalse;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class strictly extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\test')
		;
	}

	function testRecipientOfTestOnVariableIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$recipient = new mockOfScore\php\test\recipient
			)
			->if(
				$this->testedInstance->recipientOfTestOnVariableIs(true, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('booleanIs')
						->withArguments(true)
							->once

			->if(
				$this->testedInstance->recipientOfTestOnVariableIs(false, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('booleanIs')
						->withArguments(true)
							->once
		;
	}
}
