<?php namespace norsys\score\tests\units\php\test\variable;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class disjunction extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\test\variable')
		;
	}

	function testRecipientOfTestIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$test = new mockOfScore\php\test\variable,
					$otherTest = new mockOfScore\php\test\variable
				),
				$recipient = new mockOfScore\php\test\recipient
			)
			->if(
				$this->testedInstance->recipientOfTestIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($test, $otherTest))
				->mock($recipient)
					->receive('booleanIs')
						->never
				->mock($test)
					->receive('recipientOfTestIs')
						->once
				->mock($otherTest)
					->receive('recipientOfTestIs')
						->once

			->given(
				$this->calling($test)->recipientOfTestIs = function($aRecipient) {
					$aRecipient->booleanIs(false);
				}
			)
			->if(
				$this->testedInstance->recipientOfTestIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($test, $otherTest))
				->mock($recipient)
					->receive('booleanIs')
						->withArguments(false)
							->once
				->mock($test)
					->receive('recipientOfTestIs')
						->twice
				->mock($otherTest)
					->receive('recipientOfTestIs')
						->twice

			->given(
				$this->calling($otherTest)->recipientOfTestIs = function($aRecipient) {
					$aRecipient->booleanIs(false);
				}
			)
			->if(
				$this->testedInstance->recipientOfTestIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($test, $otherTest))
				->mock($recipient)
					->receive('booleanIs')
						->withArguments(false)
							->twice
				->mock($test)
					->receive('recipientOfTestIs')
						->thrice
				->mock($otherTest)
					->receive('recipientOfTestIs')
						->thrice

			->given(
				$this->calling($test)->recipientOfTestIs = function($aRecipient) {
					$aRecipient->booleanIs(true);
				}
			)
			->if(
				$this->testedInstance->recipientOfTestIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($test, $otherTest))
				->mock($recipient)
					->receive('booleanIs')
						->withArguments(true)
							->once
				->mock($test)
					->receive('recipientOfTestIs')
						->{4}
				->mock($otherTest)
					->receive('recipientOfTestIs')
						->thrice
		;
	}
}
