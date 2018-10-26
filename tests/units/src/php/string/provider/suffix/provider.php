<?php namespace norsys\score\tests\units\php\string\provider\suffix;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class provider extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\string\provider')
		;
	}

	function testRecipientOfStringIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$suffix = new mockOfScore\php\string\provider,
					$provider = new mockOfScore\php\string\provider
				),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($suffix, $provider))
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$suffixAsString = uniqid(),
				$this->calling($suffix)->recipientOfStringIs = function($aRecipient) use ($suffixAsString) {
					$aRecipient->stringIs($suffixAsString);
				},

				$providerAsString = uniqid(),
				$this->calling($provider)->recipientOfStringIs = function($aRecipient) use ($providerAsString) {
					$aRecipient->stringIs($providerAsString);
				}
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($suffix, $provider))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($providerAsString . $suffixAsString)
							->once
		;
	}
}
