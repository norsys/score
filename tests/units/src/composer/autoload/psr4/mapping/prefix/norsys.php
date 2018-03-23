<?php namespace norsys\score\tests\units\composer\autoload\psr4\mapping\prefix;

require __DIR__ . '/../../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class norsys extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\autoload\psr4\mapping\prefix')
		;
	}

	function testRecipientOfStringIs()
	{
		$this
			->given(
				$this->newTestedInstance($label = new mockOfScore\php\label),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($label))
				->mock($recipient)
					->receive('stringIs')
						->withArguments('norsys\\')
							->once

			->given(
				$labelAsString = uniqid(),
				$this->calling($label)->recipientOfStringIs = function($aRecipient) use ($labelAsString) {
					$aRecipient->stringIs($labelAsString);
				}
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($label))
				->mock($recipient)
					->receive('stringIs')
						->withArguments('norsys\\' . $labelAsString . '\\')
							->once
		;
	}
}
