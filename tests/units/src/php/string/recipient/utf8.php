<?php namespace norsys\score\tests\units\php\string\recipient;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class utf8 extends units\test
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
					$recipient = new mockOfScore\php\string\recipient
				),
				$string = uniqid()
			)
			->if(
				$this->testedInstance->stringIs($string)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($recipient))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($string)
							->once

			->given(
				$string = 'é'
			)
			->if(
				$this->testedInstance->stringIs($string)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($recipient))
				->mock($recipient)
					->receive('stringIs')
						->withArguments('Ã©')
							->once
		;
	}
}
