<?php namespace norsys\score\tests\units\net\uri\scheme;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\net\uri\scheme')
		;
	}

	/**
	 * @dataProvider badArgumentProvider
	 */
	function test__construct_withBadArgument($argument)
	{
		$this
			->exception(function() use ($argument) { $this->newTestedInstance($argument); })
				->isInstanceOf('invalidArgumentException')
				->hasMessage('Scheme must follow ALPHA *( ALPHA / DIGIT / "+" / "-" / "." )')

			->exception(function() use ($argument, & $exception) { $this->newTestedInstance($argument, $exception = new \mock\exception); })
				->isIdenticalTo($exception)
		;
	}

	protected function badArgumentProvider()
	{
		return [
			'',
			'+',
			'-',
			'.',
			rand(0, PHP_INT_MAX),
			'a%',
			'a$'
		];
	}

	/**
	 * @dataProvider goodArgumentProvider
	 */
	function testRecipientOfString_withSchemeForString($scheme, $string)
	{
		$this
			->given(
				$this->newTestedInstance($scheme),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($scheme))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($string)
							->once
		;
	}

	protected function goodArgumentProvider()
	{
		return [
			[ 'a', 'a' ],
			[ 'A', 'a' ],
			[ 'http', 'http' ],
			[ 'HTTP', 'http' ],
			[ 'HTTP-2', 'http-2' ],
			[ 'http+2', 'http+2' ],
			[ 'HTTP+2', 'http+2' ],
			[ 'http.2', 'http.2' ],
			[ 'HTTP.2', 'http.2' ],
		];
	}

}
