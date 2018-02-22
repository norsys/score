<?php namespace norsys\score\tests\units\php\test\variable\isNotFalse;

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
							->withArguments(false)
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
						->once
							->withArguments(true)
								->once
		;
	}

	protected function notFalseVariableProvider()
	{
		return [
			null,
			'',
			uniqid(),
			rand(PHP_INT_MIN, PHP_INT_MAX),
			M_PI,
			true,
			[ [] ],
			new \stdClass
		];
	}
}
