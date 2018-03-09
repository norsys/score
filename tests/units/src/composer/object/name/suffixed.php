<?php namespace norsys\score\tests\units\composer\object\name;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class suffixed extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\object\name')
		;
	}

	function testRecipientOfStringIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$name = new mockOfScore\composer\object\name,
					$suffix = new mockOfScore\composer\object\name
				),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($name, $suffix))
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$nameAsString = uniqid(),
				$this->calling($name)->recipientOfStringIs = function($aRecipient) use ($nameAsString) {
					$aRecipient->stringIs($nameAsString);
				},

				$suffixAsString = uniqid(),
				$this->calling($suffix)->recipientOfStringIs = function($aRecipient) use ($suffixAsString) {
					$aRecipient->stringIs($suffixAsString);
				}
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($name, $suffix))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($nameAsString . $suffixAsString)
							->once
		;
	}
}
