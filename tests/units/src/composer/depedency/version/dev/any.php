<?php namespace norsys\score\tests\units\composer\depedency\version\dev;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\depedency\version')
		;
	}

	function testRecipientOfStringIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$branch = new mockOfScore\vcs\branch
				),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($branch))
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$branchAsString = uniqid(),
				$this->calling($branch)->recipientOfStringIs = function($aRecipient) use ($branchAsString) {
					$aRecipient->stringIs($branchAsString);
				}
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($branch))
				->mock($recipient)
					->receive('stringIs')
						->withArguments('dev-' . $branchAsString)
							->once
		;
	}
}
