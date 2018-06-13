<?php namespace norsys\score\tests\units\php\string\recipient\slashes;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class any extends units\test
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
					$charlist = new mockOfScore\php\charlist,
					$recipient = new mockOfScore\php\string\recipient
				),
				$string = 'foo'
			)
			->if(
				$this->testedInstance->stringIs($string)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($charlist, $recipient))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($string)
							->once

			->given(
				$minChar = 'a',
				$this->calling($charlist)->recipientOfMinCharInCharlistIs = function($aRecipient) use ($minChar) {
					$aRecipient->stringIs($minChar);
				}
			)
			->if(
				$this->testedInstance->stringIs($string)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($charlist, $recipient))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($string)
							->twice
			->if(
				$this->testedInstance->stringIs('faa')
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($charlist, $recipient))
				->mock($recipient)
					->receive('stringIs')
						->withArguments('f\a\a')
							->once

			->given(
				$maxChar = 'z',
				$this->calling($charlist)->recipientOfMaxCharInCharlistIs = function($aRecipient) use ($maxChar) {
					$aRecipient->stringIs($maxChar);
				}
			)
			->if(
				$this->testedInstance->stringIs($string)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($charlist, $recipient))
				->mock($recipient)
					->receive('stringIs')
						->withArguments('\f\o\o')
							->once
			->if(
				$this->testedInstance->stringIs('fza')
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($charlist, $recipient))
				->mock($recipient)
					->receive('stringIs')
						->withArguments('\f\z\a')
							->once
		;
	}
}
