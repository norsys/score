<?php namespace norsys\score\tests\units\php\string\operator\unary;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class join extends units\test
{
	function testRecipientOfStringOperationWithStringIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$string = uniqid(),
					$otherString = uniqid()
				),
				$glue = uniqid(),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringOperationWithStringIs($glue, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($string, $otherString))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($string . $glue . $otherString)
							->once
		;
	}
}
