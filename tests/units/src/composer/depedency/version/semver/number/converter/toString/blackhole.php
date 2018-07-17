<?php namespace norsys\score\tests\units\composer\depedency\version\semver\number\converter\toString;

require __DIR__ . '/../../../../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class blackhole extends units\test
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
				$recipient = new mockOfScore\php\string\recipient,
				$number = new mockOfScore\composer\depedency\version\semver\number
			)
			->if(
				$this->testedInstance->recipientOfSemverNumberAsStringIs($number, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$this->calling($number)->recipientOfIntegerIs = function($aRecipient) {
					$aRecipient->integerIs(rand(PHP_INT_MIN, PHP_INT_MAX));
				}
			)
			->if(
				$this->testedInstance->recipientOfSemverNumberAsStringIs($number, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->never
		;
	}
}
