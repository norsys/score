<?php namespace norsys\score\tests\units\php\test\variable\isTrue;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class strictly extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\test\variable')
		;
	}

	function testRecipientOfTestIs_withTrue()
	{
		$this
			->given(
				$this->newTestedInstance(true),
				$recipient = new mockOfScore\php\test\recipient
			)
			->if(
				$this->testedInstance->recipientOfTestIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(true))
				->mock($recipient)
					->receive('booleanIs')
						->once
							->withArguments(true)
								->once
		;
	}

	/**
	 * @dataProvider notTrueVariableProvider
	 */
	function testRecipientOfTestIs_withNotTrue($variable)
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

	protected function notTrueVariableProvider()
	{
		return [
			'null' => null,
			'empty string' => '',
			'not empty string' => uniqid(),
			'any integer' => rand(PHP_INT_MIN, PHP_INT_MAX),
			'PI' => M_PI,
			'false' => false,
			'empty array' => [ [] ],
			'object' => new \stdClass
		];
	}
}
