<?php namespace norsys\score\tests\units\php\identifier;

require __DIR__ . '/../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

// http://php.net/manual/en/language.variables.basics.php
//
class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\identifier')
		;
	}

	/**
	 * @dataProvider invalidStringProvider
	 */
	function test__construct_withInvalidString($string)
	{
		$this
			->exception(function() use ($string) {
					$this->newTestedInstance($string);
				}
			)
				->isInstanceOf('invalidArgumentException')
				->hasMessage('string must match `[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*`')

			->exception(function() use ($string, & $exception) {
					$this->newTestedInstance($string, $exception = new \exception);
				}
			)
				->isIdenticalTo($exception)
		;
	}

	protected function invalidStringProvider()
	{
		return [
			rand(PHP_INT_MIN, PHP_INT_MAX)
		];
	}

	/**
	 * @dataProvider validStringProvider
	 */
	function testRecipientOfStringIs_withValidString($string)
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

	protected function validStringProvider()
	{
		return [
			'a',
			'foo',
			'foo_',
			'foo_',
		];
	}
}
