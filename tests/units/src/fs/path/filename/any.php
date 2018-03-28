<?php namespace norsys\score\tests\units\fs\path\filename;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units\fs\path\filename;
use mock\norsys\score as mockOfScore;

class any extends filename
{
	/**
	 * @dataProvider badArgumentProvider
	 */
	function test__construct_withBadArgument($argument)
	{
		$this
			->exception(function() use ($argument) { $this->newTestedInstance($argument); })
				->isInstanceOf('invalidArgumentException')
				->hasMessage('Filename must be a not empty string')

			->exception(function() use ($argument, & $exception) { $this->newTestedInstance($argument, $exception = new \mock\exception); })
				->isIdenticalTo($exception)
		;
	}

	protected function badArgumentProvider()
	{
		return [
			''
		];
	}

	function testRecipientOfStringIs()
	{
		$this
			->given(
				$this->newTestedInstance($filename = uniqid()),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($filename))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($filename)
							->once
		;
	}
}
