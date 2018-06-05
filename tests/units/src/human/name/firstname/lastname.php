<?php namespace norsys\score\tests\units\human\name\firstname;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class lastname extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\human\name')
		;
	}

	function testRecipientOfFirstnameAsStringIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$firstname = new mockOfScore\human\name\firstname,
					$lastname = new mockOfScore\human\name\lastname
				),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfFirstnameAsStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($firstname, $lastname))
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$firstnameAsString = uniqid(),
				$this->calling($firstname)->recipientOfStringIs = function($aRecipient) use ($firstnameAsString) {
					$aRecipient->stringIs($firstnameAsString);
				}
			)
			->if(
				$this->testedInstance->recipientOfFirstnameAsStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($firstname, $lastname))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($firstnameAsString)
							->once
		;
	}

	function testRecipientOfLastnameAsStringIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$firstname = new mockOfScore\human\name\firstname,
					$lastname = new mockOfScore\human\name\lastname
				),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfLastnameAsStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($firstname, $lastname))
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$lastnameAsString = uniqid(),
				$this->calling($lastname)->recipientOfStringIs = function($aRecipient) use ($lastnameAsString) {
					$aRecipient->stringIs($lastnameAsString);
				}
			)
			->if(
				$this->testedInstance->recipientOfLastnameAsStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($firstname, $lastname))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($lastnameAsString)
							->once
		;
	}
}
