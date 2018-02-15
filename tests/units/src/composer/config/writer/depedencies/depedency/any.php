<?php namespace norsys\score\tests\units\composer\config\writer\depedencies\depedency;

require __DIR__ . '/../../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\config\writer\depedencies\depedency')
		;
	}

	function testRecipientOfStringForComposerDepedencyIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$nameWriter = new mockOfScore\composer\config\writer\depedencies\depedency\name,
					$versionWriter = new mockOfScore\composer\config\writer\depedencies\depedency\version
				),
				$recipient = new mockOfScore\php\string\recipient,
				$depedency = new mockOfScore\composer\depedency
			)
			->if(
				$this->testedInstance->recipientOfStringForComposerDepedencyIs($depedency, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(
							$nameWriter,
							$versionWriter
						)
					)
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$depedencyNameAsString = uniqid(),
				$depedencyName = new mockOfScore\composer\depedency\name,

				$this->calling($depedency)->recipientOfComposerDepedencyNameIs = function($aRecipient) use ($depedencyName) {
					$aRecipient->nameOfComposerDepedencyIs($depedencyName);
				},

				$this->calling($nameWriter)->recipientOfStringForComposerDepedencyNameIs = function($aDepedencyName, $aRecipient) use ($depedencyName, $depedencyNameAsString) {
					if ($aDepedencyName == $depedencyName)
					{
						$aRecipient->stringIs($depedencyNameAsString);
					}
				},

				$depedencyVersionAsString = uniqid(),
				$depedencyVersion = new mockOfScore\composer\depedency\version,

				$this->calling($depedency)->recipientOfComposerDepedencyVersionIs = function($aRecipient) use ($depedencyVersion) {
					$aRecipient->versionOfComposerDepedencyIs($depedencyVersion);
				},

				$this->calling($versionWriter)->recipientOfStringForComposerDepedencyVersionIs = function($aDepedencyVersion, $aRecipient) use ($depedencyVersion, $depedencyVersionAsString) {
					if ($aDepedencyVersion == $depedencyVersion)
					{
						$aRecipient->stringIs($depedencyVersionAsString);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfStringForComposerDepedencyIs($depedency, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(
							$nameWriter,
							$versionWriter
						)
					)
				->mock($recipient)
					->receive('stringIs')
						->withArguments('"' . $depedencyNameAsString . '": "' . $depedencyVersionAsString . '"')
							->once
		;
	}
}
