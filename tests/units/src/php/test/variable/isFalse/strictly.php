<?php namespace norsys\score\tests\units\php\test\variable\isFalse;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class strictly extends units\test
{
	function testRecipientOfTestIs_withFalse()
	{
		$this
			->given(
				$this->newTestedInstance(false),
				$recipient = new mockOfScore\php\test\recipient
			)
			->if(
				$this->testedInstance->recipientOfTestIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(false))
				->mock($recipient)
					->receive('booleanIs')
						->once
							->withArguments(true)
								->once
		;
	}

	/**
	 * @dataProvider notFalseVariableProvider
	 */
	function testRecipientOfTestIs_withNotFalse($variable)
	{
		$this
			->given(
				$this->newTestedInstance($variable),
				$recipient = new mockOfScore\php\test\recipient
			)
			->if(
				$this->testedInstance->recipientOfTestIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($variable))
				->mock($recipient)
					->receive('booleanIs')
						->withArguments(false)
							->once
		;
	}

	protected function notFalseVariableProvider()
	{
		return [
			'null' => null,
			'empty string' => '',
			'not empty string' => uniqid(),
			'any integer' => rand(PHP_INT_MIN, PHP_INT_MAX),
			'PI' => M_PI,
			'true' => true,
			'empty array' => [ [] ],
			'object' => new \stdClass
		];
	}
}
