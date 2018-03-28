<?php namespace norsys\score\tests\units\php\string;

require __DIR__ . '/../../../runner.php';

use norsys\score\tests\units\php\string\provider;
use mock\norsys\score as mockOfScore;

class any extends provider
{
	function testRecipientOfStringIs()
	{
		$this
			->given(
				$this->newTestedInstance($string = uniqid()),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($string))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($string)
							->once
		;
	}
}
