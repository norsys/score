<?php namespace norsys\score\tests\units\serializer\keyValue\json\decorator\pretty\line\recipient;

require __DIR__ . '/../../../../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class functor extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\serializer\keyValue\json\decorator\pretty\line\recipient')
		;
	}

	function testJsonLineDecoratorIs()
	{
		$this
			->given(
				$this->newTestedInstance($callable = function() use (& $arguments) { $arguments = func_get_args(); }),
				$line = new mockOfScore\serializer\keyValue\json\decorator\pretty\line
			)
			->if(
				$this->testedInstance->jsonLineDecoratorIs($line)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($arguments)
					->isEqualTo([ $line ])
		;
	}
}
