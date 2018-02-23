<?php namespace norsys\score\tests\units\php\string\aggregator;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class all extends units\test
{
	function testBlockIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$stringProvider = new mockOfScore\php\string\provider
				),
				$block = new mockOfScore\php\block
			)
			->if(
				$this->testedInstance->blockIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($stringProvider))
				->mock($block)
					->receive('blockArgumentsAre')
						->never

			->given(
				$string = uniqid(),
				$this->calling($stringProvider)->recipientOfStringIs = function($aRecipient) use ($string) {
					$aRecipient->stringIs($string);
				}
			)
			->if(
				$this->testedInstance->blockIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($stringProvider))
				->mock($block)
					->receive('blockArgumentsAre')
						->withArguments($string)
							->once

			->given(
				$this->newTestedInstance(
					$stringProvider,
					$otherStringProvider = new mockOfScore\php\string\provider
				),

				$otherString = uniqid(),
				$this->calling($otherStringProvider)->recipientOfStringIs = function($aRecipient) use ($otherString) {
					$aRecipient->stringIs($otherString);
				}
			)
			->if(
				$this->testedInstance->blockIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($stringProvider, $otherStringProvider))
				->mock($block)
					->receive('blockArgumentsAre')
						->withArguments($string, $otherString)
							->once
		;
	}
}
