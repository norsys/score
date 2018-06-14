<?php namespace norsys\score\tests\units\php\aClass\name\sensio\bundle\distribution\bundle\composer\script;

require __DIR__ . '/../../../../../../../../../../runner.php';

use norsys\score\{
	tests\units,
	php\aNamespace,
	php\identifier
};
use mock\norsys\score as mockOfScore;

class handler extends units\test
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
				$this->newTestedInstance,
				$converter = new mockOfScore\php\aNamespace\converter\toString,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfPhpNamespaceFromToStringConverterIs($converter, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($converter)
					->receive('recipientOfPhpNamespaceAsStringIs')
						->withArguments(new aNamespace\sensio\bundle\distribution\bundle\composer, $recipient)
							->once
		;
	}

	function testRecipientOfPhpIdentifierFromToStringConverterIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$converter = new mockOfScore\php\identifier\converter\toString,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfPhpIdentifierFromToStringConverterIs($converter, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($converter)
					->receive('recipientOfPhpIdentifierAsStringIs')
						->withArguments(new identifier\sensio\bundle\distribution\bundle\composer\script\handler, $recipient)
							->once
		;
	}
}
