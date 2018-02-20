<?php namespace norsys\score\tests\units\composer\depedency\version\constraint;

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
					$operator = new mockOfScore\composer\depedency\version\constraint\operator,
					$version = new mockOfScore\composer\depedency\version
				),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($operator, $version))
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$operatorAsString = uniqid(),
				$this->calling($operator)->recipientOfStringIs = function($aRecipient) use ($operatorAsString) {
					$aRecipient->stringIs($operatorAsString);
				},

				$versionAsString = uniqid(),
				$this->calling($version)->recipientOfStringIs = function($aRecipient) use ($versionAsString) {
					$aRecipient->stringIs($versionAsString);
				}
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($operator, $version))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($operatorAsString . $versionAsString)
							->once
		;
	}
}
