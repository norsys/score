<?php namespace norsys\score\tests\units\net\authority;

require __DIR__ . '/../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\net\authority')
		;
	}

	function testRecipientOfAuthorityInUriFromToStringConverterIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$host = new mockOfScore\net\authority\host,
					$port = new mockOfScore\net\authority\port,
					$userInfo = new mockOfScore\net\authority\user\info
				),
				$converter = new mockOfScore\net\authority\converter\toString,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfAuthorityInUriFromToStringConverterIs($converter, $recipient)
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

	function testRecipientOfUserInfoInUriFromToStringConverterIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$host = new mockOfScore\net\authority\host,
					$port = new mockOfScore\net\authority\port,
					$userInfo = new mockOfScore\net\authority\user\info
				),
				$converter = new mockOfScore\net\authority\user\info\converter\toString,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfUserInfoInUriFromToStringConverterIs($converter, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($host, $port, $userInfo))
				->mock($converter)
					->receive('recipientOfUserInfoInUriAsStringIs')
						->withArguments($userInfo, $recipient)
							->once
		;
	}

	function testRecipientOfHostInUriFromToStringConverterIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$host = new mockOfScore\net\authority\host,
					$port = new mockOfScore\net\authority\port,
					$userInfo = new mockOfScore\net\authority\user\info
				),
				$converter = new mockOfScore\net\authority\host\converter\toString,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfHostInUriFromToStringConverterIs($converter, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($host, $port, $userInfo))
				->mock($converter)
					->receive('recipientOfHostInUriAsStringIs')
						->withArguments($host, $recipient)
							->once
		;
	}

	function testRecipientOfPortInUriFromToStringConverterIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$host = new mockOfScore\net\authority\host,
					$port = new mockOfScore\net\authority\port,
					$userInfo = new mockOfScore\net\authority\user\info
				),
				$converter = new mockOfScore\net\authority\port\converter\toString,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfPortInUriFromToStringConverterIs($converter, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($host, $port, $userInfo))
				->mock($converter)
					->receive('recipientOfPortInUriAsStringIs')
						->withArguments($port, $recipient)
							->once
		;
	}
}
