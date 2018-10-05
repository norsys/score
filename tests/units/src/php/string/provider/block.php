<?php namespace norsys\score\tests\units\php\string\provider;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class block extends units\test
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
					$block = new mockOfScore\php\block
				),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringis($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($block))
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$string = uniqid(),
				$this->calling($block)->blockArgumentsAre = function($aRecipient) use ($recipient, $string) {
					if ($aRecipient == $recipient)
					{
						$aRecipient->stringIs($string);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfStringis($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($block))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($string)
							->once
		;
	}
}
