<?php namespace norsys\score\tests\units\composer\config\writer\depedencies\depedency\name;

require __DIR__ . '/../../../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\config\writer\depedencies\depedency\name')
		;
	}

	function testRecipientOfStringFromComposerDepedencyNameIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$name = new mockOfScore\composer\depedency\name,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringForComposerDepedencyNameIs($name, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$nameAsString = uniqid(),
				$this->calling($name)->recipientOfStringIs = function($aRecipient) use ($nameAsString) {
					$aRecipient->stringIs($nameAsString);
				}
			)
			->if(
				$this->testedInstance->recipientOfStringForComposerDepedencyNameIs($name, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->withArguments($nameAsString)
							->once
		;
	}
}
