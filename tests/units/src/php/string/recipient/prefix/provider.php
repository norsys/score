<?php namespace norsys\score\tests\units\php\string\recipient\prefix;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class provider extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\string\recipient')
		;
	}

	function testStringIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$provider = new mockOfScore\php\string\provider,
					$recipient = new mockOfScore\php\string\recipient
				),
				$string = uniqid()
			)
			->if(
				$this->testedInstance->stringIs($string)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($provider, $recipient))
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$providerAsString = uniqid(),
				$this->calling($provider)->recipientOfStringIs = function($aRecipient) use ($providerAsString) {
					$aRecipient->stringIs($providerAsString);
				}
			)
			->if(
				$this->testedInstance->stringIs($string)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($provider, $recipient))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($providerAsString . $string)
							->once
		;
	}
}
