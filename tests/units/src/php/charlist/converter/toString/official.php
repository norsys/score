<?php namespace norsys\score\tests\units\php\charlist\converter\toString;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class official extends units\test
{
	function testRecipientOfCharlistAsStringIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$charlist = new mockOfScore\php\charlist,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfCharlistAsStringIs($charlist, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->withArguments('')
							->once

			->given(
				$minChar = 'a',
				$this->calling($charlist)->recipientOfMinCharInCharlistIs = function($aRecipient) use ($minChar) {
					$aRecipient->stringIs($minChar);
				}
			)
			->if(
				$this->testedInstance->recipientOfCharlistAsStringIs($charlist, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->withArguments($minChar)
							->once

			->given(
				$maxChar = 'z',
				$this->calling($charlist)->recipientOfMaxCharInCharlistIs = function($aRecipient) use ($maxChar) {
					$aRecipient->stringIs($maxChar);
				}
			)
			->if(
				$this->testedInstance->recipientOfCharlistAsStringIs($charlist, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->withArguments($minChar . '..' . $maxChar)
							->once
		;
	}
}
