<?php namespace norsys\score\tests\units\composer\depedency\version\semver;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\{ tests\units, composer\depedency\version\semver };
use mock\norsys\score as mockOfScore;

class major extends units\test
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
				$this->newTestedInstance($major = new mockOfScore\composer\depedency\version\semver\number),
				$recipient = new mockOfScore\composer\depedency\version\semver\number\recipient
			)
			->if(
				$this->testedInstance->recipientOfMajorNumberInSemverIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($major))
				->mock($recipient)
					->receive('semverVersionNumberIs')
						->withArguments($major)
							->once
		;
	}

	function testRecipientOfMinorInSemverIs()
	{
		$this
			->given(
				$this->newTestedInstance($major = new mockOfScore\composer\depedency\version\semver\number),
				$recipient = new mockOfScore\composer\depedency\version\semver\number\recipient
			)
			->if(
				$this->testedInstance->recipientOfMinorNumberInSemverIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($major))
				->mock($recipient)
					->receive('semverVersionNumberIs')
						->withArguments(new semver\number\blackhole)
							->once
		;
	}

	function testRecipientOfPatchInSemverIs()
	{
		$this
			->given(
				$this->newTestedInstance($major = new mockOfScore\composer\depedency\version\semver\number),
				$recipient = new mockOfScore\composer\depedency\version\semver\number\recipient
			)
			->if(
				$this->testedInstance->recipientOfPatchNumberInSemverIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($major))
				->mock($recipient)
					->receive('semverVersionNumberIs')
						->withArguments(new semver\number\blackhole)
							->once
		;
	}
}
