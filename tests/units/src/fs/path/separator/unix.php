<?php namespace norsys\score\tests\units\fs\path\separator;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units\fs\path\separator;
use mock\norsys\score as mockOfScore;

class unix extends separator
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
						->withArguments('/')
							->once
		;
	}
}
