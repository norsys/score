<?php namespace norsys\score\tests\units\composer\autoload\psr4\mapping\prefix;

require __DIR__ . '/../../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class official extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\autoload\psr4\mapping\prefix')
		;
	}

	function testRecipientOfStringIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->never

		->given(
			$this->newTestedInstance(
				$label = new mockOfScore\php\label
			),

			$labelAsString = uniqid(),
			$this->calling($label)->recipientOfStringIs = function($aRecipient) use ($labelAsString) {
				$aRecipient->stringIs($labelAsString);
			}
		)
		->if(
			$this->testedInstance->recipientOfStringIs($recipient)
		)
		->then
			->object($this->testedInstance)
				->isEqualTo($this->newTestedInstance($label))
			->mock($recipient)
				->receive('stringIs')
					->withArguments($labelAsString . '\\')
						->once

		->given(
			$this->newTestedInstance(
				$label,
				$otherLabel = new mockOfScore\php\label
			),

			$otherLabelAsString = uniqid(),
			$this->calling($otherLabel)->recipientOfStringIs = function($aRecipient) use ($otherLabelAsString) {
				$aRecipient->stringIs($otherLabelAsString);
			}
		)
		->if(
			$this->testedInstance->recipientOfStringIs($recipient)
		)
		->then
			->object($this->testedInstance)
				->isEqualTo($this->newTestedInstance($label, $otherLabel))
			->mock($recipient)
				->receive('stringIs')
					->withArguments($labelAsString . '\\' . $otherLabelAsString . '\\')
						->once
		;
	}
}
