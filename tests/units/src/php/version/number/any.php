<?php namespace norsys\score\tests\units\php\version\number;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class any extends units\php\integer\unsigned
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\version\number')
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
	}

	protected function badArgumentProvider()
	{
		return [
			rand(PHP_INT_MIN, -1)
			- M_PI
		];
	}
}
