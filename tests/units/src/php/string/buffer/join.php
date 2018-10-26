<?php namespace norsys\score\tests\units\php\string\buffer;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;

class join extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\string\buffer')
		;
	}

	function testStringForBufferIs()
	{
		$this
			->given(
				$this->newTestedInstance($glue = uniqid()),
				$string = uniqid()
			)
			->if(
				$this->testedInstance->stringForBufferIs($string)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($glue, $string))

			->if(
				$this->testedInstance->stringForBufferIs($string)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($glue, $string . $glue . $string))

			->given(
				$space = ''
			)
			->if(
				$this->testedInstance->stringForBufferIs($space)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($glue, $string . $glue . $string . $glue))
		;
	}
}
