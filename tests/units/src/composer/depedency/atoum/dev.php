<?php namespace norsys\score\tests\units\composer\depedency\atoum;

require __DIR__ . '/../../../../runner.php';

use norsys\score\{ tests\units, composer\depedency\name, composer\depedency\version\dev\master };
use mock\norsys\score as mockOfScore;

class dev extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\depedency')
		;
	}

	function testRecipientOfComposerDepedencyName()
	{
		$this
			->given(
				$this->newTestedInstance,
				$recipient = new mockOfScore\composer\depedency\name\recipient
			)
			->if(
				$this->testedInstance->recipientOfComposerDepedencyNameIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('nameOfComposerDepedencyIs')
						->withArguments(new name\atoum)
							->once
		;
	}

	function testRecipientOfComposerDepedencyVersion()
	{
		$this
			->given(
				$this->newTestedInstance,
				$recipient = new mockOfScore\composer\depedency\version\recipient
			)
			->if(
				$this->testedInstance->recipientOfComposerDepedencyVersionIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('versionOfComposerDepedencyIs')
						->withArguments(new master)
							->once
		;
	}
}
