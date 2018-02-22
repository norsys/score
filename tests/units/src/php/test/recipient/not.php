<?php namespace norsys\score\tests\units\php\test\recipient;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class not extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\test\recipient')
		;
	}

	function testBooleanIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$recipient = new mockOfScore\php\test\recipient
				)
			)

			->if(
				$this->testedInstance->booleanIs(true)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($recipient))
				->mock($recipient)
					->receive('booleanIs')
						->withArguments(false)
							->once

			->if(
				$this->testedInstance->booleanIs(false)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($recipient))
				->mock($recipient)
					->receive('booleanIs')
						->withArguments(true)
							->once
		;
	}
}
