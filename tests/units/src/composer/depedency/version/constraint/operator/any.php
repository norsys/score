<?php namespace norsys\score\tests\units\composer\depedency\version\constraint\operator;

require __DIR__ . '/../../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\depedency\version\constraint\operator')
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
				->hasMessage('Operator of composer version constraint must be a not empty string')
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
}
