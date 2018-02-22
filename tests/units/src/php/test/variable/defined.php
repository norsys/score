<?php namespace norsys\score\tests\units\php\test\variable;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class defined extends units\test
{
	function testRecipientOfTestIs_withNull()
	{
		$this
			->given(
				$this->newTestedInstance(null),
				$recipient = new mockOfScore\php\test\recipient
			)
			->if(
				$this->testedInstance->recipientOfTestIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(null))
				->mock($recipient)
					->receive('booleanIs')
						->once
							->withArguments(false)
								->once
		;
	}

	/**
	 * @dataProvider notNullVariableProvider
	 */
	function testRecipientOfTestIs_withNotNull($variable)
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

	protected function notNullVariableProvider()
	{
		return [
			'',
			uniqid(),
			rand(PHP_INT_MIN, PHP_INT_MAX),
			M_PI,
			false,
			true,
			[ [] ],
			new \stdClass
		];
	}
}
