<?php namespace norsys\score\tests\units\composer\depedency\version\semver\number;

require __DIR__ . '/../../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\depedency\version\semver\number')
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
			->exception(function() use ($argument) { $this->newTestedInstance($argument); })
				->isInstanceOf('invalidArgumentException')
				->hasMessage('Argument must be greater than or equal to zero')
		;
	}

	protected function badArgumentProvider()
	{
		return [
			rand(PHP_INT_MIN, -1),
			- M_PI
		];
	}

	function testRecipientOfIntegerIs()
	{
		$this
			->given(
				$this->newTestedInstance($integer = rand(0, PHP_INT_MAX)),
				$recipient = new mockOfScore\php\integer\recipient
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

	function testRecipientOfUnsignedIntegerIs()
	{
		$this
			->given(
				$this->newTestedInstance($integer = rand(0, PHP_INT_MAX)),
				$recipient = new mockOfScore\php\integer\unsigned\recipient
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
}
