<?php namespace norsys\score\tests\units\composer\depedency\version\constraint\operator;

require __DIR__ . '/../../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class lessThan extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\depedency\version\constraint\operator')
		;
	}

	function testRecipientOfStringIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->withArguments('<')
							->once
		;
	}
}
