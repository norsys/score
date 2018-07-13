<?php namespace norsys\score\tests\units\net\authority\user\info;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\net\authority\user\info')
		;
	}

	function testRecipientOfUserInUriFromToStringConverterIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$user = new mockOfScore\net\authority\user\info\user,
					$password = new mockOfScore\net\authority\user\info\password
				),
				$converter = new mockOfScore\net\authority\user\info\user\converter\toString,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfUserInUriFromToStringConverterIs($converter, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($user, $password))
				->mock($converter)
					->receive('recipientOfUserInUriAsStringIs')
						->withArguments($user, $recipient)
							->once
		;
	}

	function testRecipientOfPasswordInUriFromToStringConverterIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$user = new mockOfScore\net\authority\user\info\user,
					$password = new mockOfScore\net\authority\user\info\password
				),
				$converter = new mockOfScore\net\authority\user\info\password\converter\toString,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfPasswordInUriFromToStringConverterIs($converter, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($user, $password))
				->mock($converter)
					->receive('recipientOfPasswordInUriAsStringIs')
						->withArguments($password, $recipient)
							->once
		;
	}
}
