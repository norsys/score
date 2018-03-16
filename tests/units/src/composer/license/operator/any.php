<?php namespace norsys\score\tests\units\composer\license\operator;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;


class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\license\operator')
		;
	}

	function testRecipientOfStringIs()
	{
		$this
			->given(
				$this->newTestedInstance($operator = uniqid()),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($operator))
				->mock($recipient)
					->receive('stringIs')
						->withArguments(' ' . $operator . ' ')
							->once
		;
	}
}
