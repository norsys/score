<?php namespace norsys\score\tests\units\serializer\keyValue\json\depth;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\serializer\keyValue\json\depth')
		;
	}

	function test__construct()
	{
		$this->object($this->newTestedInstance)->isEqualTo($this->newTestedInstance(0));
	}

	/**
	 * @dataProvider badArgumentProvider
	 */
	function test__construct_withBadArgument($argument)
	{
		$this
			->exception(function() use ($argument) {
					$this->newTestedInstance($argument);
				}
			)
				->isInstanceOf('invalidArgumentException')
				->hasMessage('Argument must be greater than or equal to zero')

			->exception(function() use ($argument, & $exception) {
					$this->newTestedInstance($argument, $exception = new \exception);
				}
			)
				->isIdenticalTo($exception)
		;
		;
	}

	protected function badArgumentProvider()
	{
		return [
			rand(PHP_INT_MIN, -1)
			- M_PI
		];
	}

	function testRecipientOfUnsignedIntegerIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$recipient = new mockOfScore\php\integer\unsigned\recipient
			)
			->if(
				$this->testedInstance->recipientOfUnsignedIntegerIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('unsignedIntegerIs')
						->withArguments(0)
							->once

			->given(
				$this->newTestedInstance($integer = rand(1, PHP_INT_MAX))
			)
			->if(
				$this->testedInstance->recipientOfUnsignedIntegerIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($integer))
				->mock($recipient)
					->receive('unsignedIntegerIs')
						->withArguments($integer)
							->once
		;
	}

	function testRecipientOfIntegerIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$recipient = new mockOfScore\php\integer\recipient
			)
			->if(
				$this->testedInstance->recipientOfIntegerIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('integerIs')
						->withArguments(0)
							->once

			->given(
				$this->newTestedInstance($integer = rand(1, PHP_INT_MAX))
			)
			->if(
				$this->testedInstance->recipientOfIntegerIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($integer))
				->mock($recipient)
					->receive('integerIs')
						->withArguments($integer)
							->once
		;
	}

	function testRecipientOfNextJsonDepthIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$recipient = new mockOfScore\serializer\keyValue\json\depth\recipient
			)
			->if(
				$this->testedInstance->recipientOfNextDepthIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('jsonDepthIs')
						->withArguments($this->newTestedInstance(1))
							->once
		;
	}
}
