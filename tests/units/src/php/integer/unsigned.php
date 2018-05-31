<?php namespace norsys\score\tests\units\php\integer;

require __DIR__ . '/../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

abstract class unsigned extends units\test
{
	function testRecipientOfIntegerIs()
	{
		$this
			->given(
				$this->newTestedInstance($unsigned = rand(0, PHP_INT_MAX)),
				$recipient = new mockOfScore\php\integer\recipient
			)
			->if(
				$this->testedInstance->recipientOfIntegerIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($unsigned))
				->mock($recipient)
					->receive('integerIs')
						->withArguments($unsigned)
							->once
		;
	}

	function testRecipientOfUnsignedIntegerIs()
	{
		$this
			->given(
				$this->newTestedInstance($unsigned = rand(0, PHP_INT_MAX)),
				$recipient = new mockOfScore\php\integer\unsigned\recipient
			)
			->if(
				$this->testedInstance->recipientOfUnsignedIntegerIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($unsigned))
				->mock($recipient)
					->receive('unsignedIntegerIs')
						->withArguments($unsigned)
							->once
		;
	}
}
