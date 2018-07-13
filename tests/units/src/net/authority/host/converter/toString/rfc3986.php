<?php namespace norsys\score\tests\units\net\authority\host\converter\toString;

require __DIR__ . '/../../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class rfc3986 extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\net\authority\host\converter\toString')
		;
	}

	function testRecipientOfHostInUriAsStringIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$host = new mockOfScore\net\authority\host,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfHostInUriAsStringIs($host, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$hostAsString = uniqid(),
				$this->calling($host)->recipientOfStringIs = function($aRecipient) use ($hostAsString) {
					$aRecipient->stringIs($hostAsString);
				}
			)
			->if(
				$this->testedInstance->recipientOfHostInUriAsStringIs($host, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->withArguments($hostAsString)
							->once
		;
	}
}
