<?php namespace norsys\score\tests\units\composer\autoload\psr4\mapping\directory;

require __DIR__ . '/../../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class src extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\autoload\psr4\mapping\directory')
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
						->withArguments('./src/')
							->once
		;
	}
}
