<?php namespace norsys\score\tests\units\fs\path\separator;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class php extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\fs\path\separator')
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
						->withArguments(DIRECTORY_SEPARATOR)
							->once
		;
	}
}
