<?php namespace norsys\score\tests\units\composer\depedency\version\semver\converter\toString;

require __DIR__ . '/../../../../../../../runner.php';

use norsys\score\{ tests\units, php\integer\converter\toString };
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
		$this
			->object($this->newTestedInstance)
				->isEqualTo(
					$this->newTestedInstance(
						new toString\identical,
						new toString\identical,
						new toString\identical
					)
				)
		;
	}

	function testRecipientOfSemverVersionAsStringIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$majorToString = new mockOfScore\php\integer\converter\toString,
					$minorToString = new mockOfScore\php\integer\converter\toString,
					$patchToString = new mockOfScore\php\integer\converter\toString
				),
				$semver = new mockOfScore\composer\depedency\version\semver,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfSemverVersionAsStringIs($semver, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(
						$majorToString,
						$minorToString,
						$patchToString
					)
				)
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
				$this->calling($majorToString)->recipientOfPhpIntegerAsStringIs = function($aPhpInteger, $aRecipient) use ($major, $majorAsString) {
					if ($aPhpInteger == $major)
					{
						$aRecipient->stringIs($majorAsString);
					}
				},

				$minorAsString = uniqid(),
				$this->calling($minorToString)->recipientOfPhpIntegerAsStringIs = function($aPhpInteger, $aRecipient) use ($minor, $minorAsString) {
					if ($aPhpInteger == $minor)
					{
						$aRecipient->stringIs($minorAsString);
					}
				},

				$patchAsString = uniqid(),
				$this->calling($patchToString)->recipientOfPhpIntegerAsStringIs = function($aPhpInteger, $aRecipient) use ($patch, $patchAsString) {
					if ($aPhpInteger == $patch)
					{
						$aRecipient->stringIs($patchAsString);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfSemverVersionAsStringIs($semver, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(
						$majorToString,
						$minorToString,
						$patchToString
					)
				)
				->mock($recipient)
					->receive('stringIs')
						->withArguments($majorAsString . '.' . $minorAsString . '.' . $patchAsString)
							->once
		;
	}
}
