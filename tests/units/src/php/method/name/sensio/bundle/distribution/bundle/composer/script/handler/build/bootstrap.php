<?php namespace norsys\score\tests\units\php\method\name\sensio\bundle\distribution\bundle\composer\script\handler\build;

require __DIR__ . '/../../../../../../../../../../../../runner.php';

use norsys\score\tests\units\php\method\name;
use mock\norsys\score as mockOfScore;

class bootstrap extends name
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
						->withArguments('ScriptHandler')
							->once
		;
	}
}
