<?php namespace norsys\score\tests\units\composer\depedency\version;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class greaterThan extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\depedency\version')
		;
	}

	function testRecipientOfStringIs()
	{
		$this
			->given(
				$this->newTestedInstance($version = new mockOfScore\composer\depedency\version),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($version))
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$versionAsString = uniqid(),
				$this->calling($version)->recipientOfStringIs = function($aRecipient) use ($versionAsString) {
					$aRecipient->stringIs($versionAsString);
				}
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($version))
				->mock($recipient)
					->receive('stringIs')
						->withArguments('>' . $versionAsString)
							->once
		;
	}
}
