<?php namespace norsys\score\tests\units\human\name\firstname;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\human\name\firstname')
		;
	}

	function test__construct()
	{
		$this
			->exception(function() { $this->newTestedInstance(''); })
				->isInstanceOf('invalidArgumentException')
				->hasMessage('Argument must be a not empty string')

			->exception(function() use (& $exception) { $this->newTestedInstance('', $exception = new \mock\exception); })
				->isIdenticalTo($exception)
		;
	}

	function testRecipientOfStringIs()
	{
		$this
			->given(
				$this->newTestedInstance($firstname = uniqid()),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($firstname))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($firstname)
							->once
		;
	}
}
