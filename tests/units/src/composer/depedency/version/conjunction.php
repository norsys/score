<?php namespace norsys\score\tests\units\composer\depedency\version;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class conjunction extends units\test
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
					$version1 = new mockOfScore\composer\depedency\version,
					$version2 = new mockOfScore\composer\depedency\version
				),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($version1, $version2))
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$version1AsString = uniqid(),
				$this->calling($version1)->recipientOfStringIs = function($aRecipient) use ($version1AsString) {
					$aRecipient->stringIs($version1AsString);
				},

				$version2AsString = uniqid(),
				$this->calling($version2)->recipientOfStringIs = function($aRecipient) use ($version2AsString) {
					$aRecipient->stringIs($version2AsString);
				}
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($version1, $version2))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($version1AsString . ' ' . $version2AsString)
							->once

			->given(
				$this->newTestedInstance(
					$version1,
					$version2,
					$version3 = new mockOfScore\composer\depedency\version
				)
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($version1, $version2, $version3))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($version1AsString . ' ' . $version2AsString)
							->twice

			->given(
				$version3AsString = uniqid(),
				$this->calling($version3)->recipientOfStringIs = function($aRecipient) use ($version3AsString) {
					$aRecipient->stringIs($version3AsString);
				}
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($version1, $version2, $version3))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($version1AsString . ' ' . $version2AsString . ' ' . $version3AsString)
							->once
		;
	}
}
