<?php namespace norsys\score\tests\units\fs\path\filename\unix;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units\fs\path\filename;
use mock\norsys\score as mockOfScore;

class current extends filename
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
						->withArguments('.')
							->once
		;
	}
}
