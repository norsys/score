<?php namespace norsys\score\tests\units\php\aClass\name\converter\toString;

require __DIR__ . '/../../../../../../runner.php';

use norsys\score\{ tests\units, php };
use mock\norsys\score as mockOfScore;

class fqcn extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\aClass\name\converter\toString')
		;
	}

	function testRecipientOfPhpClassNameAsStringIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$name = new mockOfScore\php\aClass\name,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfPhpClassNameAsStringIs($name, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$identifierAsString = uniqid(),
				$this->calling($name)->recipientOfPhpIdentifierFromToStringConverterIs = function($aConverter, $aRecipient) use ($identifierAsString) {
					if ($aConverter == new php\identifier\converter\toString\raw)
					{
						$aRecipient->stringIs($identifierAsString);
					}
				},

				$namespaceAsString = uniqid(),
				$this->calling($name)->recipientOfPhpNamespaceFromToStringConverterIs = function($aConverter, $aRecipient) use ($namespaceAsString) {
					if ($aConverter == new php\aNamespace\converter\toString\official)
					{
						$aRecipient->stringIs($namespaceAsString);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfPhpClassNameAsStringIs($name, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->withArguments($namespaceAsString . '\\' . $identifierAsString)
							->once
		;
	}
}
