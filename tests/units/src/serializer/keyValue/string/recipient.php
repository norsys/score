<?php namespace norsys\score\tests\units\serializer\keyValue\string;

require __DIR__ . '/../../../../runner.php';

use norsys\score\{ tests\units, composer\part\text };
use mock\norsys\score as mockOfScore;

class recipient extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\string\recipient')
		;
	}

	function testStringIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$serializer = new mockOfScore\serializer\keyValue
				),
				$string = uniqid()
			)
			->if(
				$this->testedInstance->stringIs($string)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($serializer))
				->mock($serializer)
					->receive('textToSerializeIs')
						->withArguments(new text\any($string))
							->once
		;
	}
}
