<?php namespace norsys\score\tests\units\php\test;

require __DIR__ . '/../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class isGreaterThan extends units\test
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
				$this->newTestedInstance($reference = PHP_INT_MAX),
				$variable = rand(PHP_INT_MIN, PHP_INT_MAX - 1),
				$recipient = new mockOfScore\php\test\recipient
			)
			->if(
				$this->testedInstance->recipientOfTestOnVariableIs($variable, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($reference))
				->mock($recipient)
					->receive('booleanIs')
						->withArguments(false)
							->once

			->given(
				$this->newTestedInstance($reference = PHP_INT_MIN),
				$variable = rand(PHP_INT_MIN + 1, PHP_INT_MAX)
			)
			->if(
				$this->testedInstance->recipientOfTestOnVariableIs($variable, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($reference))
				->mock($recipient)
					->receive('booleanIs')
						->withArguments(true)
							->once
		;
	}
}
