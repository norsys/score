<?php namespace norsys\score\tests\units\composer\depedency\version\constraint\operator;

require __DIR__ . '/../../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class orEqualTo extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\depedency\version\constraint\operator')
		;
	}

	function testRecipientOfStringIs()
	{
		$this
			->given(
				$this->newTestedInstance($operator = new mockOfScore\composer\depedency\version\constraint\operator),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($operator))
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$operatorAsString = uniqid(),
				$this->calling($operator)->recipientOfStringIs = function($aRecipient) use ($operatorAsString) {
					$aRecipient->stringIs($operatorAsString);
				}
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($operator))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($operatorAsString . '=')
							->once
		;
	}
}
