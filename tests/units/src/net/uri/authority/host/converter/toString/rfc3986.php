<?php namespace norsys\score\tests\units\net\uri\authority\host\converter\toString;

require __DIR__ . '/../../../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class rfc3986 extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\net\uri\authority\host\converter\toString')
		;
	}

	function testRecipientOfHostInUriAuthorityAsStringIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$host = new mockOfScore\net\uri\authority\host,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfHostInUriAuthorityAsStringIs($host, $recipient)
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
				$this->testedInstance->recipientOfHostInUriAuthorityAsStringIs($host, $recipient)
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
