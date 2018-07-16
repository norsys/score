<?php namespace norsys\score\tests\units\net\uri\authority\user\info\user\converter\toString;

require __DIR__ . '/../../../../../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class rfc3986 extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\net\uri\authority\user\info\user\converter\toString')
		;
	}

	function testRecipientOfUserInUriAuthorityAsStringIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$user = new mockOfScore\net\uri\authority\user\info\user,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfUserInUriAuthorityAsStringIs($user, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($user)
					->receive('recipientOfStringIs')
						->withArguments($recipient)
							->once
		;
	}
}
