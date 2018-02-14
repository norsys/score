<?php namespace norsys\score\tests\units\composer\config\writer\depedencies;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\config\writer\depedencies')
		;
	}

	function testRecipientOfStringForDepedenciesFromComposerDepedenciesIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$depedencyWriter = new mockOfScore\composer\config\writer\depedencies\depedency
				),
				$depedencies = new mockOfScore\composer\depedency\container,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringForDepedenciesFromComposerDepedenciesIs($depedencies, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(
							$depedencyWriter
						)
					)
				->mock($recipient)
					->receive('stringIs')
						->withArguments('require: {' . PHP_EOL . '}')
							->once

			->given(
				$depedency = new mockOfScore\composer\depedency,

				$depedencies = new mockOfScore\composer\depedency\container,
				$this->calling($depedencies)->blockForContainerIteratorIs = function($iterator, $block) use ($depedency) {
					$iterator->variablesForIteratorBlockAre($block, $depedency);
				},

				$jsonDepedency = uniqid(),
				$this->calling($depedencyWriter)->recipientOfStringForComposerDepedencyIs = function($aDepedency, $aRecipient) use ($depedency, $jsonDepedency) {
					if ($aDepedency == $depedency)
					{
						$aRecipient->stringIs($jsonDepedency);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfStringForDepedenciesFromComposerDepedenciesIs($depedencies, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(
							$depedencyWriter
						)
					)
				->mock($recipient)
					->receive('stringIs')
						->withArguments(
							'require: {' . PHP_EOL .
							'	' . $jsonDepedency . PHP_EOL .
							'}'
						)
							->once

			->given(
				$otherDepedency = new mockOfScore\composer\depedency,

				$this->calling($depedencies)->blockForContainerIteratorIs = function($iterator, $block) use ($depedency, $otherDepedency) {
					$iterator->variablesForIteratorBlockAre($block, $depedency, $otherDepedency);
				},

				$otherJsonDepedency = uniqid(),
				$this->calling($depedencyWriter)->recipientOfStringForComposerDepedencyIs = function($aDepedency, $aRecipient) use ($depedency, $jsonDepedency, $otherDepedency, $otherJsonDepedency) {
					switch (true)
					{
						case $aDepedency == $depedency:
							$aRecipient->stringIs($jsonDepedency);
							break;

						case $aDepedency == $otherDepedency:
							$aRecipient->stringIs($otherJsonDepedency);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfStringForDepedenciesFromComposerDepedenciesIs($depedencies, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(
							$depedencyWriter
						)
					)
				->mock($recipient)
					->receive('stringIs')
						->withArguments(
							'require: {' . PHP_EOL .
							'	' . $jsonDepedency . ',' . PHP_EOL .
							'	' . $otherJsonDepedency . PHP_EOL .
							'}'
						)
							->once
		;
	}
}
