<?php namespace norsys\score\tests\units\composer\depedency\version\semver;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\{ tests\units, composer\depedency\version\semver, php\integer };
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\depedency\version\semver')
		;
	}

	function test__construct()
	{
		$this
			->object($this->newTestedInstance)
				->isEqualTo(
					$this->newTestedInstance(
						new semver\number\any,
						new semver\number\any,
						new semver\number\any,
						new semver\converter\toString\dot
					)
				)
		;
	}

	function testRecipientOfMajorInSemverIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$major = new mockOfScore\composer\depedency\version\semver\number
				),
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
				$this->newTestedInstance(
					$major = new mockOfScore\composer\depedency\version\semver\number,
					$minor = new mockOfScore\composer\depedency\version\semver\number
				),
				$recipient = new mockOfScore\composer\depedency\version\semver\number\recipient
			)
			->if(
				$this->testedInstance->recipientOfMinorNumberInSemverIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($major, $minor))
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
					$major = new mockOfScore\composer\depedency\version\semver\number,
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
					->isEqualTo($this->newTestedInstance($major, $minor, $patch))
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
					$major = new mockOfScore\composer\depedency\version\semver\number,
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
					->isEqualTo($this->newTestedInstance($major, $minor, $patch, $semverToStringConverter))
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
					->isEqualTo($this->newTestedInstance($major, $minor, $patch, $semverToStringConverter))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($semverAsString)
							->once
		;
	}
}
