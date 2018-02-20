<?php namespace norsys\score\tests\units\php\integer\converter\toString;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class any extends units\test
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
				$this->newTestedInstance($string = uniqid()),
				$recipient = new mockOfScore\php\string\recipient,
				$integer = new mockOfScore\php\integer\provider
			)
			->if(
				$this->testedInstance->recipientOfPhpIntegerAsStringIs($integer, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($string))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($string)
							->once
		;
	}
}
