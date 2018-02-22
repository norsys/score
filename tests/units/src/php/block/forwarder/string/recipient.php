<?php namespace norsys\score\tests\units\php\block\forwarder\string;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class recipient extends units\test
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
					$string = uniqid(),
					$recipient = new mockOfScore\php\string\recipient
				)
			)
			->if(
				$this->testedInstance->blockArgumentsAre()
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($string, $recipient))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($string)
							->once
		;
	}
}
