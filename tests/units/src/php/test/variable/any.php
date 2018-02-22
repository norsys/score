<?php namespace norsys\score\tests\units\php\test\variable;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testRecipientOfTestIs()
	{
		$this
			->given(
				$this->newTestedInstance($variable = uniqid(), $test = new mockOfScore\php\test),
				$recipient = new mockOfScore\php\test\recipient
			)
			->if(
				$this->testedInstance->recipientOfTestIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($variable, $test))
				->mock($test)
					->receive('recipientOfTestOnVariableIs')
						->withArguments($variable, $recipient)
							->once
		;
	}
}
