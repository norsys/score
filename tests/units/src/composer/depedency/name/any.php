<?php namespace norsys\score\tests\units\composer\depedency\name;

require __DIR__ . '/../../../../runner.php';

use norsys\score\{ tests\units, php };
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\depedency\name')
		;
	}

	function test__construct()
	{
		$this
			->object(
				$this->newTestedInstance(
					$vendor = new mockOfScore\composer\depedency\name\vendor,
					$project = new mockOfScore\composer\depedency\name\project
				)
			)
				->isEqualTo(
					$this->newTestedInstance(
						$vendor,
						$project,
						new php\string\formater\sprintf('%s/%s')
					)
				)
		;
	}

	function testRecipientOfStringIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$vendor = new mockOfScore\composer\depedency\name\vendor,
					$project = new mockOfScore\composer\depedency\name\project,
					$formater = new mockOfScore\php\string\formater
				),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($vendor, $project, $formater))
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$vendorAsString = uniqid(),
				$this->calling($vendor)->recipientOfStringIs = function($aRecipient) use (& $vendorAsString) {
					$aRecipient->stringIs($vendorAsString);
				},

				$projectAsString = uniqid(),
				$this->calling($project)->recipientOfStringIs = function($aRecipient) use (& $projectAsString) {
					$aRecipient->stringIs($projectAsString);
				},

				$formaterAsString = uniqid(),
				$this->calling($formater)->stringsForRecipientOfFormatedStringAre = function($aRecipient, ...$strings) use ($vendorAsString, $projectAsString, & $formaterAsString) {
					if ($strings == [ $vendorAsString, $projectAsString ])
					{
						$aRecipient->stringIs($formaterAsString);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($vendor, $project, $formater))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($formaterAsString)
							->once
		;
	}
}
