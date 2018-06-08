<?php namespace norsys\score\tests\units\php\method\name\converter\toString;

require __DIR__ . '/../../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class raw extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\method\name\converter\toString')
		;
	}

	function testRecipientOfPhpMethodNameAsStringIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$name = new mockOfScore\php\method\name,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfPhpMethodNameAsStringIs($name, $recipient)
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
				$this->testedInstance->recipientOfPhpMethodNameAsStringIs($name, $recipient)
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
