<?php namespace norsys\score\tests\units\php\string\provider\iterator;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class fifo extends units\test
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
					$provider = new mockOfScore\php\string\provider
				),
				$recipient = new mockOfScore\php\string\recipient,
				$this->calling($recipient)->stringIs = function($aString) use (& $strings) {
					$strings[] = $aString;
				}
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($provider))
				->variable($strings)
					->isNull

			->given(
				$stringFromProvider = uniqid(),
				$this->calling($provider)->recipientOfStringIs = function($aRecipient) use ($stringFromProvider) {
					$aRecipient->stringIs($stringFromProvider);
				}
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($provider))
				->array($strings)
					->isEqualTo([ $stringFromProvider ])


			->given(
				$strings = null,

				$this->newTestedInstance(
					$provider,
					$otherProvider = new mockOfScore\php\string\provider
				),

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
					->isEqualTo($this->newTestedInstance($provider, $otherProvider))
				->array($strings)
					->isEqualTo([ $stringFromProvider, $stringFromOtherProvider ])
		;
	}
}
