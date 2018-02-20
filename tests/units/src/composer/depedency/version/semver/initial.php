<?php namespace norsys\score\tests\units\composer\depedency\version\semver;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\{ tests\units, composer\depedency\version\semver };
use mock\norsys\score as mockOfScore;

class initial extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\depedency\version\semver')
		;
	}

	function testRecipientOfMajorInSemverIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$minor = new mockOfScore\composer\depedency\version\semver\number,
					$patch = new mockOfScore\composer\depedency\version\semver\number
				),
				$recipient = new mockOfScore\composer\depedency\version\semver\number\recipient
			)
			->if(
				$this->testedInstance->recipientOfMajorNumberInSemverIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($minor, $patch))
				->mock($recipient)
					->receive('semverVersionNumberIs')
						->withArguments(new semver\number\initial)
							->once
		;
	}

	function testRecipientOfMinorInSemverIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$minor = new mockOfScore\composer\depedency\version\semver\number,
					$patch = new mockOfScore\composer\depedency\version\semver\number
				),
				$recipient = new mockOfScore\composer\depedency\version\semver\number\recipient
			)
			->if(
				$this->testedInstance->recipientOfMinorNumberInSemverIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($minor, $patch))
				->mock($recipient)
					->receive('semverVersionNumberIs')
						->withArguments($minor)
							->once
		;
	}

	function testRecipientOfPatchInSemverIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$minor = new mockOfScore\composer\depedency\version\semver\number,
					$patch = new mockOfScore\composer\depedency\version\semver\number
				),
				$recipient = new mockOfScore\composer\depedency\version\semver\number\recipient
			)
			->if(
				$this->testedInstance->recipientOfPatchNumberInSemverIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($minor, $patch))
				->mock($recipient)
					->receive('semverVersionNumberIs')
						->withArguments($patch)
							->once
		;
	}

	function testRecipientOfStringIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$minor = new mockOfScore\composer\depedency\version\semver\number,
					$patch = new mockOfScore\composer\depedency\version\semver\number,
					$semverToStringConverter = new mockOfScore\composer\depedency\version\semver\converter\toString
				),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($minor, $patch, $semverToStringConverter))
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$semverAsString = uniqid(),
				$this->calling($semverToStringConverter)->recipientOfSemverVersionAsStringIs = function($aSemver, $aRecipient) use ($semverAsString) {
					if ($aSemver == $this->testedInstance)
					{
						$aRecipient->stringIs($semverAsString);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($minor, $patch, $semverToStringConverter))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($semverAsString)
							->once
		;
	}
}
