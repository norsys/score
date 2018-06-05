<?php namespace norsys\score\tests\units\human\name\converter\toString\firstname;

require __DIR__ . '/../../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class lastname extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\human\name\converter\toString')
		;
	}

	function testRecipientOfHumanNameAsStringIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$name = new mockOfScore\human\name,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfHumanNameAsStringIs($name, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$firstnameAsString = uniqid(),
				$this->calling($name)->recipientOfFirstnameAsStringIs = function($aRecipient) use ($firstnameAsString) {
					$aRecipient->stringIs($firstnameAsString);
				},
				$lastnameAsString = uniqid(),
				$this->calling($name)->recipientOfLastnameAsStringIs = function($aRecipient) use ($lastnameAsString) {
					$aRecipient->stringIs($lastnameAsString);
				}
			)
			->if(
				$this->testedInstance->recipientOfHumanNameAsStringIs($name, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->withArguments($firstnameAsString . ' ' . $lastnameAsString)
							->once
		;
	}
}
