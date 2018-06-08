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
				$this->newTestedInstance($identifier = new mockOfScore\php\identifier),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($identifier))
				->mock($recipient)
					->receive('stringIs')
						->withArguments('norsys\\')
							->once

			->given(
				$identifierAsString = uniqid(),
				$this->calling($identifier)->recipientOfStringIs = function($aRecipient) use ($identifierAsString) {
					$aRecipient->stringIs($identifierAsString);
				}
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($identifier))
				->mock($recipient)
					->receive('stringIs')
						->withArguments('norsys\\' . $identifierAsString . '\\')
							->once
		;
	}
}
