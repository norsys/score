<?php namespace norsys\score\tests\units\php\block;

require __DIR__ . '/../../../runner.php';

use norsys\score\tests\units;

class exception extends units\test
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
				$exception = new \exception
			)
			->if(
				$this->newTestedInstance($exception)
			)
			->then
				->exception(function() { $this->testedInstance->blockArgumentsAre(); })
					->isIdenticalTo($exception)
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($exception))
		;
	}
}
