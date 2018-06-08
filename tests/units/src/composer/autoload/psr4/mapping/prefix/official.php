<?php namespace norsys\score\tests\units\composer\autoload\psr4\mapping\prefix;

require __DIR__ . '/../../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class official extends units\test
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
						->never

		->given(
			$this->newTestedInstance(
				$identifier = new mockOfScore\php\identifier
			),

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
					->withArguments($identifierAsString . '\\')
						->once

		->given(
			$this->newTestedInstance(
				$identifier,
				$otherIdentifier = new mockOfScore\php\identifier
			),

			$otherIdentifierAsString = uniqid(),
			$this->calling($otherIdentifier)->recipientOfStringIs = function($aRecipient) use ($otherIdentifierAsString) {
				$aRecipient->stringIs($otherIdentifierAsString);
			}
		)
		->if(
			$this->testedInstance->recipientOfStringIs($recipient)
		)
		->then
			->object($this->testedInstance)
				->isEqualTo($this->newTestedInstance($identifier, $otherIdentifier))
			->mock($recipient)
				->receive('stringIs')
					->withArguments($identifierAsString . '\\' . $otherIdentifierAsString . '\\')
						->once
		;
	}
}
