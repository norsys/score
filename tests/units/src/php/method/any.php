<?php namespace norsys\score\tests\units\php\method;

require __DIR__ . '/../../../runner.php';

use norsys\score\tests\units\php\method;
use mock\norsys\score as mockOfScore;

class any extends method
{
	function testRecipientOfPhpMethodNameFromToStringConverterIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$class = new mockOfScore\php\aClass\name,
					$name = new mockOfScore\php\method\name
				),
				$converter = new mockOfScore\php\method\name\converter\toString,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfPhpMethodNameFromToStringConverterIs($converter, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($class, $name))
				->mock($converter)
					->receive('recipientOfPhpMethodNameAsStringIs')
						->withArguments($name, $recipient)
							->once
		;
	}

	function testRecipientOfPhpClassNameFromToStringConverterIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$class = new mockOfScore\php\aClass\name,
					$name = new mockOfScore\php\method\name
				),
				$converter = new mockOfScore\php\aClass\name\converter\toString,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfPhpClassNameFromToStringConverterIs($converter, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($class, $name))
				->mock($converter)
					->receive('recipientOfPhpClassNameAsStringIs')
						->withArguments($class, $recipient)
							->once
		;
	}
}
