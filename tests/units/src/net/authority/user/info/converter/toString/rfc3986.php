<?php namespace norsys\score\tests\units\net\authority\user\info\converter\toString;

require __DIR__ . '/../../../../../../../runner.php';

use norsys\score\{ tests\units, net\authority\user };
use mock\norsys\score as mockOfScore;

class rfc3986 extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\net\authority\user\info\converter\toString')
		;
	}

	function testRecipientOfUserInfoInUriAsStringIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$userInfo = new mockOfScore\net\authority\user\info,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfUserInfoInUriAsStringIs($userInfo, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$userAsString = uniqid(),
				$this->calling($userInfo)->recipientOfUserInUriFromToStringConverterIs = function($aConverter, $aRecipient) use ($userAsString) {
					if ($aConverter == new user\info\user\converter\toString\rfc3986)
					{
						$aRecipient->stringIs($userAsString);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfUserInfoInUriAsStringIs($userInfo, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->withArguments($userAsString)
							->once

			->given(
				$passwordAsString = uniqid(),
				$this->calling($userInfo)->recipientOfPasswordInUriFromToStringConverterIs = function($aConverter, $aRecipient) use ($passwordAsString) {
					if ($aConverter == new user\info\password\converter\toString\rfc3986)
					{
						$aRecipient->stringIs($passwordAsString);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfUserInfoInUriAsStringIs($userInfo, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->withArguments($userAsString . ':' . $passwordAsString)
							->once

			->given(
				$passwordAsString = '',
				$this->calling($userInfo)->recipientOfPasswordInUriFromToStringConverterIs = function($aConverter, $aRecipient) use ($passwordAsString) {
					if ($aConverter == new user\info\password\converter\toString\rfc3986)
					{
						$aRecipient->stringIs($passwordAsString);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfUserInfoInUriAsStringIs($userInfo, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->withArguments($userAsString . ':')
							->once
		;
	}
}
