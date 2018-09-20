<?php namespace norsys\score\tests\units\net\uri\scheme;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use norsys\score\net\port;
use mock\norsys\score as mockOfScore;

class http extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\net\uri\scheme')
		;
	}

	function test__construct()
	{
		$this->object($this->newTestedInstance)->isEqualTo($this->newTestedInstance(new port\blackhole));
	}

	function testRecipientOfString()
	{
		$this
			->given(
				$this->newTestedInstance($port = new mockOfScore\net\port),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($port))
				->mock($recipient)
					->receive('stringIs')
						->withArguments('http')
							->once
		;
	}

	function testRecipientOfPortInUriSchemeAsStringFromConverterIs()
	{
		$this
			->given(
				$this->newTestedInstance($port = new mockOfScore\net\port),
				$converter = new mockOfScore\net\port\converter\toString,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfPortInUriSchemeAsStringFromConverterIs($converter, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($port))
				->mock($converter)
					->receive('recipientOfNetPortAsStringIs')
						->withArguments($port, $recipient)
							->once
		;
	}
}
