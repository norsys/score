<?php namespace norsys\score\tests\units\net\uri\authority\port;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\net\uri\authority\port')
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
