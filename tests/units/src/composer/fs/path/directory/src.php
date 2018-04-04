<?php namespace norsys\score\tests\units\composer\fs\path\directory;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units\composer\fs\path;
use mock\norsys\score as mockOfScore;

class src extends path
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
						->withArguments('./src/')
							->once
		;
	}
}
