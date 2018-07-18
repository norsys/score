<?php namespace norsys\score\tests\units\php\string\recipient\buffer;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;

class join extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\string\recipient')
			->implements('norsys\score\php\string\provider')
		;
	}

	function testStringIs()
	{
		$this
			->given(
				$this->newTestedInstance($glue = uniqid()),
				$string = uniqid()
			)
			->if(
				$this->testedInstance->stringIs($string)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($glue, $string))

			->if(
				$this->testedInstance->stringIs($string)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($glue, $string . $glue . $string))

			->given(
				$space = ''
			)
			->if(
				$this->testedInstance->stringIs($space)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($glue, $string . $glue . $string . $glue . $space))
		;
	}
}
