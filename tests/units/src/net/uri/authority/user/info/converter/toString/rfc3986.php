<?php namespace norsys\score\tests\units\net\uri\authority\user\info\converter\toString;

require __DIR__ . '/../../../../../../../../runner.php';

use norsys\score\{ tests\units, net\uri\authority\user };
use mock\norsys\score as mockOfScore;

class rfc3986 extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\net\uri\authority\user\info\converter\toString')
		;
	}

	function testRecipientOfUserInfoInUriAuthorityAsStringIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$userInfo = new mockOfScore\net\uri\authority\user\info,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfUserInfoInUriAuthorityAsStringIs($userInfo, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$userAsString = uniqid(),
				$this->calling($userInfo)->recipientOfUserInUriAuthorityAsStringFromConverterIs = function($aConverter, $aRecipient) use ($userAsString) {
					if ($aConverter == new user\info\user\converter\toString\rfc3986)
					{
						$aRecipient->stringIs($userAsString);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfUserInfoInUriAuthorityAsStringIs($userInfo, $recipient)
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
				$this->calling($userInfo)->recipientOfPasswordInUriAuthorityAsStringFromConverterIs = function($aConverter, $aRecipient) use ($passwordAsString) {
					if ($aConverter == new user\info\password\converter\toString\rfc3986)
					{
						$aRecipient->stringIs($passwordAsString);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfUserInfoInUriAuthorityAsStringIs($userInfo, $recipient)
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
				$this->calling($userInfo)->recipientOfPasswordInUriAuthorityAsStringFromConverterIs = function($aConverter, $aRecipient) use ($passwordAsString) {
					if ($aConverter == new user\info\password\converter\toString\rfc3986)
					{
						$aRecipient->stringIs($passwordAsString);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfUserInfoInUriAuthorityAsStringIs($userInfo, $recipient)
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
