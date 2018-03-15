<?php namespace norsys\score\tests\units\php\test\isFalse;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class strictly extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\test')
		;
	}

	function testRecipientOfTestOnVariableIs_withTrue()
	{
		$this
			->given(
				$this->newTestedInstance,
				$recipient = new mockOfScore\php\test\recipient
			)

			->if(
				$this->testedInstance->recipientOfTestOnVariableIs(true, $recipient)
			)
			->then
				->mock($recipient)
					->receive('booleanIs')
						->withArguments(false)
							->once
		;
	}

	/**
	 * @dataProvider notFalseProvider
	 */
	function testRecipientOfTestOnVariableIs_withNotFalse($variable)
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
				->mock($recipient)
					->receive('booleanIs')
						->withArguments(false)
							->once
		;
	}

	protected function notFalseProvider()
	{
		return [
			null,
			true,
			'',
			uniqid(),
			rand(PHP_INT_MIN, PHP_INT_MAX),
			M_PI,
			[[]],
			new \stdClass
		];
	}
}
