<?php namespace norsys\score\tests\units\composer\config;

require __DIR__ . '/../../../runner.php';

use norsys\score\{ tests\units, composer };
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\config')
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
						->withArguments(new composer\depedency\container\blackhole)
							->once

			->given(
				$configReader = new mockOfScore\composer\config\reader,

				$depedencies = new mockOfScore\composer\depedency\container,
				$this->calling($configReader)->recipientOfComposerDepedenciesIs = function($recipient) use ($depedencies) {
					$recipient->composerDepedenciesIs($depedencies);
				},

				$this->newTestedInstance($configReader)
			)
			->if(
				$this->testedInstance->recipientOfComposerDepedenciesIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($configReader))
				->mock($recipient)
					->receive('composerDepedenciesIs')
						->withArguments($depedencies)
							->once
		;
	}
}
