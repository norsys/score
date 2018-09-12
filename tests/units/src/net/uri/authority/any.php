<?php namespace norsys\score\tests\units\net\uri\authority;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\net\uri\authority')
		;
	}

	function testRecipientOfAuthorityInUriFromToStringConverterIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$host = new mockOfScore\net\host,
					$port = new mockOfScore\net\port,
					$userInfo = new mockOfScore\net\uri\authority\user\info
				),
				$converter = new mockOfScore\net\uri\authority\converter\toString,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfUriAuthorityAsStringFromConverterIs($converter, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($host, $port, $userInfo))
				->mock($converter)
					->receive('recipientOfUriAuthorityAsStringIs')
						->withArguments($this->testedInstance, $recipient)
							->once
		;
	}

	function testRecipientOfUserInfoInUriAuthorityAsStringFromConverterIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$host = new mockOfScore\net\host,
					$port = new mockOfScore\net\port,
					$userInfo = new mockOfScore\net\uri\authority\user\info
				),
				$converter = new mockOfScore\net\uri\authority\user\info\converter\toString,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfUserInfoInUriAuthorityAsStringFromConverterIs($converter, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($host, $port, $userInfo))
				->mock($converter)
					->receive('recipientOfUserInfoInUriAuthorityAsStringIs')
						->withArguments($userInfo, $recipient)
							->once
		;
	}

	function testRecipientOfHostInUriAuthorityAsStringFromConverterIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$host = new mockOfScore\net\host,
					$port = new mockOfScore\net\port,
					$userInfo = new mockOfScore\net\uri\authority\user\info
				),
				$converter = new mockOfScore\net\host\converter\toString,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfHostInUriAuthorityAsStringFromConverterIs($converter, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($host, $port, $userInfo))
				->mock($converter)
					->receive('recipientOfHostInUriAuthorityAsStringIs')
						->withArguments($host, $recipient)
							->once
		;
	}

	function testRecipientOfPortInUriAuthorityAsStringFromConverterIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$host = new mockOfScore\net\host,
					$port = new mockOfScore\net\port,
					$userInfo = new mockOfScore\net\uri\authority\user\info
				),
				$converter = new mockOfScore\net\port\converter\toString,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfPortInUriAuthorityAsStringFromConverterIs($converter, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($host, $port, $userInfo))
				->mock($converter)
					->receive('recipientOfPortInUriAuthorityAsStringIs')
						->withArguments($port, $recipient)
							->once
		;
	}
}
