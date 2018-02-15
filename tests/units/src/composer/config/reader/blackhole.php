<?php namespace norsys\score\tests\units\composer\config\reader;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class blackhole extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\config\reader')
		;
	}

	function testRecipientOfComposerDepedenciesIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$recipient = new mockOfScore\composer\depedency\container\recipient
			)
			->if(
				$this->testedInstance->recipientOfComposerDepedenciesIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('composerDepedenciesIs')
						->never
		;
	}
}
