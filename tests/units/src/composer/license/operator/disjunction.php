<?php namespace norsys\score\tests\units\composer\license\operator;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units\composer\license\operator;;
use mock\norsys\score as mockOfScore;

class disjunction extends operator
{
	function testRecipientOfStringIs()
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
						->withArguments(' or ')
							->once
		;
	}
}
