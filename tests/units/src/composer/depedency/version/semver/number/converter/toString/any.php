<?php namespace norsys\score\tests\units\composer\depedency\version\semver\number\converter\toString;

require __DIR__ . '/../../../../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class any extends units\test
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
				$this->newTestedInstance($string = uniqid()),
				$recipient = new mockOfScore\php\string\recipient,
				$number = new mockOfScore\composer\depedency\version\semver\number
			)
			->if(
				$this->testedInstance->recipientOfSemverNumberAsStringIs($number, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($string))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($string)
							->once
		;
	}
}
