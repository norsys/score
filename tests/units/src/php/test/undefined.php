<?php namespace norsys\score\tests\units\php\test;

require __DIR__ . '/../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class undefined extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\test')
		;
	}

	function testRecipientOfTestOnVariableIs_withNull()
	{
		$this
			->given(
				$this->newTestedInstance,
				$recipient = new mockOfScore\php\test\recipient
			)
			->if(
				$this->testedInstance->recipientOfTestOnVariableIs(null, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('booleanIs')
						->once
						->withArguments(true)
							->once
		;
	}

	/**
	 * @dataProvider notNullVariableProvider
	 */
	function testRecipientOfTestOnVariableIs_withNotNull($variable)
	{
		$this
			->given(
				$this->newTestedInstance,
				$recipient = new mockOfScore\php\test\recipient
			)
			->if(
				$this->testedInstance->recipientOfTestOnVariableIs($variable, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('booleanIs')
						->once
						->withArguments(false)
							->once
		;
	}

	protected function notNullVariableProvider()
	{
		return [
			'',
			0,
			rand(PHP_INT_MIN, PHP_INT_MAX),
			M_PI,
			true,
			false,
			[[]],
			new \stdclass
		];
	}
}
