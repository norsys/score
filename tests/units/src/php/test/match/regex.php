<?php namespace norsys\score\tests\units\php\test\match;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class regex extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\test\variable')
		;
	}

	function testRecipientOfTestIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$regex = new mockOfScore\php\string\regex,
					$provider = new mockOfScore\php\string\provider
				),
				$recipient = new mockOfScore\php\test\recipient
			)
			->if(
				$this->testedInstance->recipientOfTestIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($regex, $provider))
				->mock($recipient)
					->receive('booleanIs')
						->never

			->given(
				$string = uniqid(),
				$this->calling($provider)->recipientOfStringIs = function($aRecipient) use ($string) {
					$aRecipient->stringIs($string);
				}
			)
			->if(
				$this->testedInstance->recipientOfTestIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($regex, $provider))
				->mock($regex)
					->receive('recipientOfRegexMatchingAgainstStringIs')
						->withArguments($string, $recipient)
							->once
		;
	}
}
