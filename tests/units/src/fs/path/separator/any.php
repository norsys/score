<?php namespace norsys\score\tests\units\fs\path\separator;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units\fs\path\separator;
use mock\norsys\score as mockOfScore;

class any extends separator
{
	function test__construct_withInvalidArgument()
	{
		$this
			->exception(function() { $this->newTestedInstance(''); })
				->isInstanceOf('invalidArgumentException')
				->hasMessage('Path separator must be a not empty string')

			->exception(function() use (& $exception) { $this->newTestedInstance('', $exception = new \exception); })
				->isIdenticalTo($exception)
		;
	}

	function testRecipientOfStringIs()
	{
		$this
			->given(
				$this->newTestedInstance($separator = uniqid()),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($separator))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($separator)
							->once
		;
	}
}
