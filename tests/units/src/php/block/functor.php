<?php namespace norsys\score\tests\units\php\block;

require __DIR__ . '/../../../runner.php';

use norsys\score\tests\units;

class functor extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\block')
		;
	}

	function testBlockArgumentsAre()
	{
		$this
			->given(
				$this->newTestedInstance(
					$callable = function() use (& $arguments) { $arguments = func_get_args(); }
				)
			)
			->if(
				$this->testedInstance->blockArgumentsAre()
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($arguments)
					->isEmpty

			->given(
				$arguments = range($start = rand(1, 5), rand($start, $start + rand(1, 5)))
			)
			->if(
				$this->testedInstance->blockArgumentsAre(... $arguments)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($arguments)
					->isEqualTo($arguments)
		;
	}
}
