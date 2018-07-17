<?php namespace norsys\score\tests\units\composer\depedency\version\semver\number\converter\toString;

require __DIR__ . '/../../../../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class identical extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\depedency\version\semver\number\converter\toString')
		;
	}

	function testRecipientOfSemverNumberAsStringIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$number = new mockOfScore\composer\depedency\version\semver\number,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfSemverNumberAsStringIs($number, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($number)
					->receive('recipientOfStringIs')
						->withArguments($recipient)
							->once
		;
	}
}
