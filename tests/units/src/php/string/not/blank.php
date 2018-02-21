<?php namespace norsys\score\tests\units\php\string\not;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class blank extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\string\provider')
		;
	}

	function testRecipientOfStringIs()
	{
		$this
			->given(
				$this->newTestedInstance($string = uniqid()),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($string))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($string)
							->once
		;
	}

	/**
	 * @dataProvider badArgumentProvider
	 */
	function test__construct_withBadArgument($argument)
	{
		$this
			->exception(function() use ($argument) { $this->newTestedInstance($argument); })
				->isInstanceOf('invalidArgumentException')
				->hasMessage('Argument must be a not empty string')

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
}
