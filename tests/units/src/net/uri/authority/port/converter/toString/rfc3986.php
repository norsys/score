<?php namespace norsys\score\tests\units\net\uri\authority\port\converter\toString;

require __DIR__ . '/../../../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class rfc3986 extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\net\uri\authority\port\converter\toString')
		;
	}

	function testRecipientOfPortInUriAsStringIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$port = new mockOfScore\net\uri\authority\port,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfPortInUriAuthorityAsStringIs($port, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$portAsString = uniqid(),
				$this->calling($port)->recipientOfStringIs = function($aRecipient) use ($portAsString) {
					$aRecipient->stringIs($portAsString);
				}
			)
			->if(
				$this->testedInstance->recipientOfPortInUriAuthorityAsStringIs($port, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->withArguments($portAsString)
							->once
		;
	}
}
