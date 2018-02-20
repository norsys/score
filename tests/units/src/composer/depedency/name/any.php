<?php namespace norsys\score\tests\units\composer\depedency\name;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\depedency\name')
		;
	}

	/**
	 * @dataProvider goodArgumentProvider
	 */
	function testRecipientOfStringIs_withArgument($string)
	{
		$this
			->given(
				$this->newTestedInstance($string),
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

	protected function goodArgumentProvider()
	{
		return [
			0,
			rand(0, 9),
			chr(rand(65, 90)), // a-z
			chr(rand(97, 122)), // A-Z
			chr(rand(91, 96)), // [, \ , ], ^, `, _
			chr(rand(123, 126)), // {, |, },  ~
			uniqid(),
			rand(PHP_INT_MIN, PHP_INT_MAX),
			' ',
			"	",
			PHP_EOL,
			' ' . uniqid(),
			"	" . uniqid(),
			PHP_EOL . uniqid(),
			uniqid() . ' ',
			uniqid() . "	",
			uniqid() . PHP_EOL,
			uniqid() . ' ' . uniqid(),
			uniqid() . "	" . uniqid(),
			uniqid() . PHP_EOL . uniqid()
		];
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
				->hasMessage('Composer depedency name must not be an empty string')
		;
	}

	protected function badArgumentProvider()
	{
		return [
			''
		];
	}
}
