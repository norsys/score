<?php namespace norsys\score\tests\units\net\uri\authority\user\info\user;

require __DIR__ . '/../../../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\net\uri\authority\user\info\user')
		;
	}

	function test__construct_withBadArgument()
	{
		$this
			->exception(function() { $this->newTestedInstance(''); })
					->isInstanceOf('invalidArgumentException')
					->hasMessage('User in URI must be a not empty string')

			->exception(function() use (& $exception) { $this->newTestedInstance('', $exception = new \exception); })
					->isIdenticalTo($exception)
		;
	}

	function testRecipientOfStringIs()
	{
		$this
			->given(
				$this->newTestedInstance($string = uniqid()),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($string))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($string)
							->once
		;
	}
}
