<?php namespace norsys\score\tests\units\php\version\number\converter\toString;

require __DIR__ . '/../../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class asInteger extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\version\number\converter\toString')
		;
	}

	function testRecipientOfPhpVersionAsStringIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$number = new mockOfScore\php\version\number,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfPhpVersionNumberAsStringIs($number, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$numberAsInteger = rand(PHP_INT_MIN, PHP_INT_MAX),
				$this->calling($number)->recipientOfIntegerIs = function($aRecipient) use ($numberAsInteger) {
					$aRecipient->integerIs($numberAsInteger);
				}
			)
			->if(
				$this->testedInstance->recipientOfPhpVersionNumberAsStringIs($number, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->withArguments((string) $numberAsInteger)
							->once
		;
	}
}
