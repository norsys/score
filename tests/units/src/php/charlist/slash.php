<?php namespace norsys\score\tests\units\php\charlist;

require __DIR__ . '/../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class slash extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\charlist')
		;
	}

	function testRecipientOfMinCharInCharlistIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfMinCharInCharlistIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->withArguments('\\')
							->once
		;
	}

	function testRecipientOfMaxCharInCharlistIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfMaxCharInCharlistIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->never
		;
	}
}
