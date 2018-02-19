<?php namespace norsys\score\tests\units\composer\depedency\version\semver\converter\toString;

require __DIR__ . '/../../../../../../../runner.php';

use norsys\score\{ tests\units, php };
use mock\norsys\score as mockOfScore;

class dot extends units\test
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
					$integerToString = new mockOfScore\php\integer\converter\toString
				),
				$semver = new mockOfScore\composer\depedency\version\semver,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfSemverVersionAsStringIs($semver, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($integerToString))
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$major = new mockOfScore\composer\depedency\version\semver\number,
				$this->calling($semver)->recipientOfMajorNumberInSemverIs = function($aRecipient) use ($major) {
					$aRecipient->semverVersionNumberIs($major);
				},

				$minor = new mockOfScore\composer\depedency\version\semver\number,
				$this->calling($semver)->recipientOfminorNumberInSemverIs = function($aRecipient) use ($minor) {
					$aRecipient->semverVersionNumberIs($minor);
				},

				$patch = new mockOfScore\composer\depedency\version\semver\number,
				$this->calling($semver)->recipientOfpatchNumberInSemverIs = function($aRecipient) use ($patch) {
					$aRecipient->semverVersionNumberIs($patch);
				},

				$majorAsString = uniqid(),
				$minorAsString = uniqid(),
				$patchAsString = uniqid(),
				$this->calling($integerToString)->recipientOfPhpIntegerAsStringIs = function($aPhpInteger, $aRecipient) use ($major, $majorAsString, $minor, $minorAsString, $patch, $patchAsString) {
					switch (true)
					{
						case $aPhpInteger == $major:
							$aRecipient->stringIs($majorAsString);
							break;

						case $aPhpInteger == $minor:
							$aRecipient->stringIs($minorAsString);
							break;

						case $aPhpInteger == $patch:
							$aRecipient->stringIs($patchAsString);
							break;
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfSemverVersionAsStringIs($semver, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($integerToString))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($majorAsString . '.' . $minorAsString . '.' . $patchAsString)
							->once
		;
	}
}
