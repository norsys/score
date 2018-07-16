<?php namespace norsys\score\tests\units\net\uri\authority\user\info;

require __DIR__ . '/../../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\net\uri\authority\user\info')
		;
	}

	function testRecipientOfUserInUriAuthorityAsStringFromConverterIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$user = new mockOfScore\net\uri\authority\user\info\user,
					$password = new mockOfScore\net\uri\authority\user\info\password
				),
				$converter = new mockOfScore\net\uri\authority\user\info\user\converter\toString,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfUserInUriAuthorityAsStringFromConverterIs($converter, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($user, $password))
				->mock($converter)
					->receive('recipientOfUserInUriAuthorityAsStringIs')
						->withArguments($user, $recipient)
							->once
		;
	}

	function testRecipientOfPasswordInUriAuthorityAsStringFromConverterIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$user = new mockOfScore\net\uri\authority\user\info\user,
					$password = new mockOfScore\net\uri\authority\user\info\password
				),
				$converter = new mockOfScore\net\uri\authority\user\info\password\converter\toString,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfPasswordInUriAuthorityAsStringFromConverterIs($converter, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($user, $password))
				->mock($converter)
					->receive('recipientOfPasswordInUriAuthorityAsStringIs')
						->withArguments($password, $recipient)
							->once
		;
	}
}
