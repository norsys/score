<?php namespace norsys\score\tests\units\composer\depedency\version\semver\converter\toString\dot\major;

require __DIR__ . '/../../../../../../../../../runner.php';

use norsys\score\{ tests\units, php };
use mock\norsys\score as mockOfScore;

class wildcard extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\depedency\version\semver\converter\toString')
		;
	}

	function test__construct()
	{
		$this->object($this->newTestedInstance)->isEqualTo($this->newTestedInstance(new php\integer\converter\toString\identical));
	}

	function testRecipientOfSemverVersionAsStringIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$integerToStringConverter = new mockOfScore\php\integer\converter\toString
				),
				$semver = new mockOfScore\composer\depedency\version\semver,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfSemverVersionAsStringIs($semver, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($integerToStringConverter))
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$major = new mockOfScore\composer\depedency\version\semver\number,
				$this->calling($semver)->recipientOfMajorNumberInSemverIs = function($aRecipient) use ($major) {
					$aRecipient->semverVersionNumberIs($major);
				},

				$majorAsString = uniqid(),
				$this->calling($integerToStringConverter)->recipientOfPhpIntegerAsStringIs = function($aPhpInteger, $aRecipient) use ($major, $majorAsString) {
					if ($aPhpInteger == $major)
					{
						$aRecipient->stringIs($majorAsString);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfSemverVersionAsStringIs($semver, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($integerToStringConverter))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($majorAsString . '.*')
							->once
		;
	}
}
