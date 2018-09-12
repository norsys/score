<?php namespace norsys\score\tests\units\net\port;

require __DIR__ . '/../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\net\port')
		;
	}

	function testRecipientOfIntegerIs()
	{
		$this
			->given(
				$this->newTestedInstance($value = rand(0, 65535)),
				$recipient = new mockOfScore\php\integer\recipient
			)
			->if(
				$this->testedInstance->recipientOfIntegerIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($value))
				->mock($recipient)
				->receive('integerIs')
					->withArguments($value)
						->once
		;
	}

	function testRecipientOfUnsignedIntegerIs()
	{
		$this
			->given(
				$this->newTestedInstance($value = rand(0, 65535)),
				$recipient = new mockOfScore\php\integer\unsigned\recipient
			)
			->if(
				$this->testedInstance->recipientOfUnsignedIntegerIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($value))
				->mock($recipient)
				->receive('unsignedIntegerIs')
					->withArguments($value)
						->once
		;
	}

	function testRecipientOfStringIs()
	{
		$this
			->given(
				$this->newTestedInstance($value = rand(0, 65535)),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($value))
				->mock($recipient)
				->receive('stringIs')
					->withArguments($value)
						->once
		;
	}

	/**
	 * @dataProvider badArgumentProvider
	 */
	function testConstructor_withBadArgument($badArgument)
	{
		$this
			->exception(function() use ($badArgument) { $this->newTestedInstance($badArgument); })
				->isInstanceOf('invalidArgumentException')
				->hasMessage('Port must have a value greater than or equal to 0 and less than or equal to 65535')

			->exception(function() use ($badArgument, & $exception) { $this->newTestedInstance($badArgument, $exception = new \exception); })
				->isIdenticalTo($exception)
		;
	}

	protected function badArgumentProvider()
	{
		return [
			rand(PHP_INT_MIN, -1),
			rand(65536, PHP_INT_MAX)
		];
	}
}
