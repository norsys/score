<?php namespace norsys\score\tests\units\composer\config\writer\depedencies\depedency\version;

require __DIR__ . '/../../../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\config\writer\depedencies\depedency\version')
		;
	}

	function testRecipientOfStringFromComposerDepedencyVersionIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$version = new mockOfScore\composer\depedency\version,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringForComposerDepedencyVersionIs($version, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
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
				$this->testedInstance->recipientOfStringForComposerDepedencyVersionIs($version, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->withArguments($versionAsString)
							->once
		;
	}
}
