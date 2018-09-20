<?php namespace norsys\score\tests\units\net\uri\scheme;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class rfc3986 extends units\test
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
			->exception(function() use ($argument) { $this->newTestedInstance($argument, new mockOfScore\net\port); })
				->isInstanceOf('invalidArgumentException')
				->hasMessage('Scheme must follow ALPHA *( ALPHA / DIGIT / "+" / "-" / "." )')

			->exception(function() use ($argument, & $exception) { $this->newTestedInstance($argument, new mockOfScore\net\port, $exception = new \mock\exception); })
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
				$this->newTestedInstance($scheme, $port = new mockOfScore\net\port),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($scheme, $port))
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

	/**
	 * @dataProvider goodArgumentProvider
	 */
	function testRecipientOfPortInUriSchemeAsStringFromConverterIs($scheme)
	{
		$this
			->given(
				$this->newTestedInstance('http', $port = new mockOfScore\net\port),
				$converter = new mockOfScore\net\port\converter\toString,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfPortInUriSchemeAsStringFromConverterIs($converter, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance('http', $port))
				->mock($converter)
					->receive('recipientOfNetPortAsStringIs')
						->withArguments($port, $recipient)
							->once
		;
	}
}
