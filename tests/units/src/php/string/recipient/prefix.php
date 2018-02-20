<?php namespace norsys\score\tests\units\php\string\recipient;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class prefix extends units\test
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
				$this->newTestedInstance($prefix = uniqid(), $recipient = new mockOfScore\php\string\recipient),
				$string = uniqid()
			)
			->if(
				$this->testedInstance->stringIs($string)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($prefix, $recipient))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($prefix . $string)
							->once
		;
	}
}
