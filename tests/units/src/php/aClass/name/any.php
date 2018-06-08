<?php namespace norsys\score\tests\units\php\aClass\name;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\aClass\name')
		;
	}

	function testRecipientOfPhpNamespaceFromToStringConverterIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$namespace = new mockOfScore\php\aNamespace,
					$name = new mockOfScore\php\identifier
				),
				$converter = new mockOfScore\php\aNamespace\converter\toString,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfPhpNamespaceFromToStringConverterIs($converter, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($namespace, $name))
				->mock($converter)
					->receive('recipientOfPhpNamespaceAsStringIs')
						->withArguments($namespace, $recipient)
							->once
		;
	}

	function testRecipientOfPhpIdentifierFromToStringConverterIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$namespace = new mockOfScore\php\aNamespace,
					$name = new mockOfScore\php\identifier
				),
				$converter = new mockOfScore\php\identifier\converter\toString,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfPhpIdentifierFromToStringConverterIs($converter, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($namespace, $name))
				->mock($converter)
					->receive('recipientOfPhpIdentifierAsStringIs')
						->withArguments($name, $recipient)
							->once
		;
	}
}
