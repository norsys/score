<?php namespace norsys\score\tests\units\serializer\keyValue\json\depth\recipient;

require __DIR__ . '/../../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class functor extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\serializer\keyValue\json\depth\recipient')
		;
	}

	function testJsonDepthIs()
	{
		$this
			->given(
				$this->newTestedInstance($callable = function() use (& $arguments) { $arguments = func_get_args(); }),
				$depth = new mockOfScore\serializer\keyValue\json\depth
			)
			->if(
				$this->testedInstance->jsonDepthIs($depth)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($arguments)
					->isEqualTo([ $depth ])
		;
	}
}
