<?php namespace norsys\score\tests\units\php\integer\converter\toString;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class blackhole extends units\test
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
				$recipient = new mockOfScore\php\string\recipient,

				$integer = new mockOfScore\php\integer\provider,
				$this->calling($integer)->recipientOfIntegerIs = function($recipient) {
					$recipient->integerIs(rand(PHP_INT_MIN, PHP_INT_MAX));
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
						->never
		;
	}
}
