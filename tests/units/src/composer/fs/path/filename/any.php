<?php namespace norsys\score\tests\units\composer\fs\path\filename;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\fs\path\filename')
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
				->hasMessage('Argument must be string less than 256 bytes which not contains `\0`, `/`, `\`, `:`, `*`, `?`, `<`, `>` or `|`')

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
			str_repeat(chr(rand(1, 127)), 256),
			chr(0),
			'/',
			'\\',
			':',
			'*',
			'?',
			'<',
			'>',
			'|'
		];
	}

	function testRecipientOfStringIs()
	{
		$this
			->given(
				$this->newTestedInstance($filename = uniqid()),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($filename))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($filename)
							->once
		;
	}
}
