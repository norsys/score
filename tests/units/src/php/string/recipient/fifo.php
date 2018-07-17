<?php namespace norsys\score\tests\units\php\string\recipient;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class fifo extends units\test
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
					$recipient = new mockOfScore\php\string\recipient,
					$otherRecipient = new mockOfScore\php\string\recipient
				),
				$string = uniqid(),

				$this->calling($recipient)->stringIs = function($aString) use (& $recipients, $recipient, $string) {
					if ($aString == $string)
					{
						$recipients[] = $recipient;
					}
				},

				$this->calling($otherRecipient)->stringIs = function($aString) use (& $recipients, $otherRecipient, $string) {
					if ($aString == $string)
					{
						$recipients[] = $otherRecipient;
					}
				}
			)
			->if(
				$this->testedInstance->stringIs($string)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($recipient, $otherRecipient))
				->array($recipients)
					->isEqualTo([ $recipient, $otherRecipient ])
		;
	}
}
