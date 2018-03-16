<?php namespace norsys\score\tests\units\php\string\recipient\surround;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class same extends units\test
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
					$surround = uniqid(),
					$recipient = new mockOfScore\php\string\recipient
				),
				$string = uniqid()
			)
			->if(
				$this->testedInstance->stringIs($string)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($surround, $recipient))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($surround . $string . $surround)
							->once
		;
	}
}
