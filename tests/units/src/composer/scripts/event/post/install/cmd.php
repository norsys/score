<?php namespace norsys\score\tests\units\composer\scripts\event\post\install;

require __DIR__ . '/../../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class cmd extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\scripts\event')
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
						->withArguments('post-install-cmd')
							->once
		;
	}
}
