<?php namespace norsys\score\tests\units\composer\depedency\version\range;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class inclusive extends units\test
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
					$low = new mockOfScore\composer\depedency\version,
					$high = new mockOfScore\composer\depedency\version
				),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($low, $high))
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$lowAsString = uniqid(),
				$this->calling($low)->recipientOfStringIs = function($aRecipient) use ($lowAsString) {
					$aRecipient->stringIs($lowAsString);
				},

				$highAsString = uniqid(),
				$this->calling($high)->recipientOfStringIs = function($aRecipient) use ($highAsString) {
					$aRecipient->stringIs($highAsString);
				}
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($low, $high))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($lowAsString . ' - ' . $highAsString)
							->once
		;
	}
}
