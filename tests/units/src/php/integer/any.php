<?php namespace norsys\score\tests\units\php\integer;

require __DIR__ . '/../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\integer\provider')
		;
	}

	function testRecipientOfStringIs()
	{
		$this
			->given(
				$this->newTestedInstance($integer = rand(PHP_INT_MIN, PHP_INT_MAX)),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($integer))
				->mock($recipient)
					->receive('stringIs')
						->withArguments((string) $integer)
							->once
		;
	}

	function testRecipientOfIntegerIs()
	{
		$this
			->given(
				$this->newTestedInstance($integer = rand(PHP_INT_MIN, PHP_INT_MAX)),
				$recipient = new mockOfScore\php\integer\recipient
			)
			->if(
				$this->testedInstance->recipientOfIntegerIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($integer))
				->mock($recipient)
					->receive('integerIs')
						->withArguments($integer)
							->once
		;
	}
}
