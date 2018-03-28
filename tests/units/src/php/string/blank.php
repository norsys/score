<?php namespace norsys\score\tests\units\php\string;

require __DIR__ . '/../../../runner.php';

use norsys\score\tests\units\php\string\provider;
use mock\norsys\score as mockOfScore;

class blank extends provider
{
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
						->withArguments('')
							->once
		;
	}
}
