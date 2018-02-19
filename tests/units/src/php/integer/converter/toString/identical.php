<?php namespace norsys\score\tests\units\php\integer\converter\toString;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class identical extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\integer\converter\toString')
		;
	}

	function testRecipientOfPhpIntegerAsStringIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$integer = new mockOfScore\php\integer\provider,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfPhpIntegerAsStringIs($integer, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$int = rand(PHP_INT_MIN, PHP_INT_MAX),
				$this->calling($integer)->recipientOfIntegerIs = function($aRecipient) use ($int) {
					$aRecipient->integerIs($int);
				}
			)
			->if(
				$this->testedInstance->recipientOfPhpIntegerAsStringIs($integer, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->withArguments((string) $int)
							->once
		;
	}
}
