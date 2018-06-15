<?php namespace norsys\score\tests\units\php\method\sensio\bundle\distribution\bundle\composer\script\handler\build;

require __DIR__ . '/../../../../../../../../../../../runner.php';

use norsys\score\{
	tests\units\php\method,
	php
};

use mock\norsys\score as mockOfScore;

class bootstrap extends method
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
						->withArguments(new php\method\name\sensio\bundle\distribution\bundle\composer\script\handler\build\bootstrap, $recipient)
							->once
		;
	}

	function testRecipientOfPhpClassNameFromToStrngConverterIs()
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
						->withArguments(new php\aClass\name\sensio\bundle\distribution\bundle\composer\script\handler, $recipient)
							->once
		;
	}
}
