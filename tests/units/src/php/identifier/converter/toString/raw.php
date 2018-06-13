<?php namespace norsys\score\tests\units\php\identifier\converter\toString;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class raw extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\identifier\converter\toString')
		;
	}

	function testRecipientOfPhpIdentifierAsStringIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$identifier = new mockOfScore\php\identifier,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfPhpIdentifierAsStringIs($identifier, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($identifier)
					->receive('recipientOfStringIs')
						->withArguments($recipient)
							->once
		;
	}
}
