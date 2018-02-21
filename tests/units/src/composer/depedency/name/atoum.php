<?php namespace norsys\score\tests\units\composer\depedency\name;

require __DIR__ . '/../../../../runner.php';

use norsys\score\{ tests\units, php };
use mock\norsys\score as mockOfScore;

class atoum extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\depedency\name')
		;
	}

	function test__construct()
	{
		$this->object($this->newTestedInstance)->isEqualTo($this->newTestedInstance(new php\string\formater\sprintf('%s/%s')));
	}

	function testRecipientOfStringIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$formater = new mockOfScore\php\string\formater
				),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($formater))
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$formatedString = uniqid(),
				$this->calling($formater)->stringsForRecipientOfFormatedStringAre = function($aRecipient, ...$strings) use ($formatedString) {
					if ($strings == [ 'atoum', 'atoum'  ])
					{
						$aRecipient->stringIs($formatedString);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($formater))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($formatedString)
							->once
		;
	}
}
