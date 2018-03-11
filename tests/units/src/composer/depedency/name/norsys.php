<?php namespace norsys\score\tests\units\composer\depedency\name;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class norsys extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\depedency\name')
		;
	}

	function testRecipientOfStringIs()
	{
		$this
			->given(
				$this->newTestedInstance($project = new mockOfScore\composer\depedency\name\project),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($project))
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$projectAsString = uniqid(),
				$this->calling($project)->recipientOfStringIs = function($aRecipient) use ($projectAsString) {
					$aRecipient->stringIs($projectAsString);
				}
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($project))
				->mock($recipient)
					->receive('stringIs')
						->withArguments('norsys/' . $projectAsString)
							->once
		;
	}
}
