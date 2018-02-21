<?php namespace norsys\score\tests\units\php\string\formater;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class sprintf extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\string\formater')
		;
	}

	function testSttringsForRecipientOfFormatedStringAre()
	{
		$this
			->given(
				$this->newTestedInstance($format = '%s'),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->stringsForRecipientOfFormatedStringAre($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($format))
				->mock($recipient)
					->receive('stringis')
						->never

			->given(
				$this->newTestedInstance($format = ''),
				$string = uniqid()
			)
			->if(
				$this->testedInstance->stringsForRecipientOfFormatedStringAre($recipient, $string)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(''))
				->mock($recipient)
					->receive('stringis')
						->withArguments($format)
							->once

			->given(
				$this->newTestedInstance($format = '%s %s'),
				$string = uniqid()
			)
			->if(
				$this->testedInstance->stringsForRecipientOfFormatedStringAre($recipient, $string)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($format))
				->mock($recipient)
					->receive('stringis')
						->withArguments('')
							->once

			->given(
				$this->newTestedInstance($format = '%s' . ($spacer = uniqid()) . '%s')
			)
			->if(
				$this->testedInstance->stringsForRecipientOfFormatedStringAre($recipient, $string)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($format))
				->mock($recipient)
					->receive('stringis')
						->withArguments($string)
							->never

			->given(
				$otherString = uniqid()
			)
			->if(
				$this->testedInstance->stringsForRecipientOfFormatedStringAre($recipient, $string, $otherString)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($format))
				->mock($recipient)
					->receive('stringis')
						->withArguments($string . $spacer . $otherString)
							->once
		;
	}
}
