<?php namespace norsys\score\tests\units\php\string;

require __DIR__ . '/../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class join extends units\test
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
					$glue = new mockOfScore\php\string\provider,
					$provider = new mockOfScore\php\string\provider,
					$otherProvider = new mockOfScore\php\string\provider
				),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($glue, $provider, $otherProvider))
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$stringFromGlue = uniqid(),
				$this->calling($glue)->recipientOfStringIs = function($aRecipient) use ($stringFromGlue) {
					$aRecipient->stringIs($stringFromGlue);
				},

				$stringFromProvider = uniqid(),
				$this->calling($provider)->recipientOfStringIs = function($aRecipient) use ($stringFromProvider) {
					$aRecipient->stringIs($stringFromProvider);
				},

				$stringFromOtherProvider = uniqid(),
				$this->calling($otherProvider)->recipientOfStringIs = function($aRecipient) use ($stringFromOtherProvider) {
					$aRecipient->stringIs($stringFromOtherProvider);
				}
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($glue, $provider, $otherProvider))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($stringFromProvider . $stringFromGlue . $stringFromOtherProvider)
							->once

			->given(
				$this->newTestedInstance(
					$glue,
					$provider,
					$otherProvider ,
					$anotherProvider = new mockOfScore\php\string\provider
				),

				$stringFromAnotherProvider = uniqid(),
				$this->calling($anotherProvider)->recipientOfStringIs = function($aRecipient) use ($stringFromAnotherProvider) {
					$aRecipient->stringIs($stringFromAnotherProvider);
				}
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($glue, $provider, $otherProvider, $anotherProvider))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($stringFromProvider . $stringFromGlue . $stringFromOtherProvider . $stringFromGlue . $stringFromAnotherProvider)
							->once
		;
	}
}
