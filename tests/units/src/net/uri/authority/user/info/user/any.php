<?php namespace norsys\score\tests\units\net\uri\authority\user\info\user;

require __DIR__ . '/../../../../../../../runner.php';

use norsys\score\tests\units;

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
}
