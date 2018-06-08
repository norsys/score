<?php namespace norsys\score\tests\units\php\string\recipient\buffer\prefix;

require __DIR__ . '/../../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class provider extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\string\recipient')
			->implements('norsys\score\php\string\provider')
		;
	}

	function testStringIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$provider = new mockOfScore\php\string\provider
				),
				$string = uniqid()
			)
			->if(
				$this->testedInstance->stringIs($string)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($provider))

			->given(
				$providerAsString = uniqid(),
				$this->calling($provider)->recipientOfStringIs = function($aRecipient) use ($providerAsString) {
					$aRecipient->stringIs($providerAsString);
				},

				$this->newTestedInstance(
					$provider
				)
			)
			->if(
				$this->testedInstance->stringIs($string)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($provider, $providerAsString . $string))
		;
	}

	function testRecipientOfStringIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$provider = new mockOfScore\php\string\provider
				),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($provider))
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$this->newTestedInstance($provider, $string = uniqid())
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($provider, $string))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($string)
							->once
		;
	}
}
