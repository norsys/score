<?php namespace norsys\score\tests\units\net\authority\converter\toString;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\{ tests\units, net\authority\host, net\authority\port, net\authority\user };
use mock\norsys\score as mockOfScore;

class rfc3986 extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\net\authority\converter\toString')
		;
	}

	function testRecipientOfUriAuthorityAsStringIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$authority = new mockOfScore\net\authority,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfUriAuthorityAsStringIs($authority, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$host = uniqid(),
				$this->calling($authority)->recipientOfHostInUriFromToStringConverterIs = function($converter, $recipient) use ($host) {
					if ($converter == new host\converter\toString\rfc3986)
					{
						$recipient->stringIs($host);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfUriAuthorityAsStringIs($authority, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->withArguments($host)
							->once

			->given(
				$port = ':80',
				$this->calling($authority)->recipientOfPortInUriFromToStringConverterIs = function($converter, $recipient) use ($port) {
					if ($converter == new port\converter\toString\rfc3986)
					{
						$recipient->stringIs($port);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfUriAuthorityAsStringIs($authority, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->withArguments($host . ':' . $port)
							->once

			->given(
				$userInfo = uniqid(),
				$this->calling($authority)->recipientOfUserInfoInUriFromToStringConverterIs = function($converter, $recipient) use ($userInfo) {
					if ($converter == new user\info\converter\toString\rfc3986)
					{
						$recipient->stringIs($userInfo);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfUriAuthorityAsStringIs($authority, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->withArguments($userInfo . '@' . $host . ':' . $port)
							->once

			->given(
				$this->newTestedInstance,
				$authority = new mockOfScore\net\authority,
				$recipient = new mockOfScore\php\string\recipient,

				$port = uniqid(),
				$this->calling($authority)->recipientOfPortInUriFromToStringConverterIs = function($converter, $recipient) use ($port) {
					if ($converter == new port\converter\toString\official)
					{
						$recipient->stringIs($port);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfUriAuthorityAsStringIs($authority, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->never
		;
	}
}
