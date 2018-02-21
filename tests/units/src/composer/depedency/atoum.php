<?php namespace norsys\score\tests\units\composer\depedency;

require __DIR__ . '/../../../runner.php';

use norsys\score\{ tests\units, composer\depedency\name };
use mock\norsys\score as mockOfScore;

class atoum extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\depedency')
		;
	}

	function testRecipientOfComposerDepedencyNameIs()
	{
		$this
			->given(
				$this->newTestedInstance($version = new mockOfScore\composer\depedency\version),
				$recipient = new mockOfScore\composer\depedency\name\recipient
			)
			->if(
				$this->testedInstance->recipientOfComposerDepedencyNameIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($version))
				->mock($recipient)
					->receive('nameOfComposerDepedencyIs')
						->withArguments(new name\atoum)
							->once
		;
	}

	function testRecipientOfComposerDepedencyVersionIs()
	{
		$this
			->given(
				$this->newTestedInstance($version = new mockOfScore\composer\depedency\version),
				$recipient = new mockOfScore\composer\depedency\version\recipient
			)
			->if(
				$this->testedInstance->recipientOfComposerDepedencyVersionIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($version))
				->mock($recipient)
					->receive('versionOfComposerDepedencyIs')
						->withArguments($version)
							->once
		;
	}
}
