<?php namespace norsys\score\tests\units\net\uri\authority\user\info\password\converter\toString;

require __DIR__ . '/../../../../../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class rfc3986 extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\net\uri\authority\user\info\password\converter\toString')
		;
	}

	function testRecipientOfPasswordInUriAuthorityAsStringIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$password = new mockOfScore\net\uri\authority\user\info\password,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfPasswordInUriAuthorityAsStringIs($password, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($password)
					->receive('recipientOfStringIs')
						->withArguments($recipient)
							->once
		;
	}
}
