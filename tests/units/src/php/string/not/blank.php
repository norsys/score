<?php namespace norsys\score\tests\units\php\string\not;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;

class blank extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\string\provider')
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
				->hasMessage('Argument must be a not empty string')
		;
	}

	protected function badArgumentProvider()
	{
		return [
			''
		];
	}
}
