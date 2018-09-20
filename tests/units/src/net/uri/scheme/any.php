<?php namespace norsys\score\tests\units\net\uri\scheme;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\net\uri\scheme')
		;
	}

	function testRecipientOfString()
	{
		$this
			->given(
				$this->newTestedInstance(
					$scheme = uniqid(),
					$port = new mockOfScore\net\port
				),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($scheme, $port))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($scheme)
							->once
		;
	}

	function testRecipientOfPortInUriSchemeAsStringFromConverterIs()
	{
		$this
			->given(
				$this->newTestedInstance($scheme = uniqid(), $port = new mockOfScore\net\port),
				$converter = new mockOfScore\net\port\converter\toString,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfPortInUriSchemeAsStringFromConverterIs($converter, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($scheme, $port))
				->mock($converter)
					->receive('recipientOfNetPortAsStringIs')
						->withArguments($port, $recipient)
							->once
		;
	}
}
