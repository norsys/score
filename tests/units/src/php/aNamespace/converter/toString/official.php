<?php namespace norsys\score\tests\units\php\aNamespace\converter\toString;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\{ tests\units, php\identifier };
use mock\norsys\score as mockOfScore;

class official extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\aNamespace\converter\toString')
		;
	}

	function testRecipientOfPhpNamespaceAsStringIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$namespace = new mockOfScore\php\aNamespace,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfPhpNamespaceAsStringIs($namespace, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$identifierAsAstring = uniqid(),
				$otherIdentifierAsString = uniqid(),
				$this->calling($namespace)->recipientOfIdentifierFromToStringConverterIs = function($aConverter, $aRecipient) use ($identifierAsAstring, $otherIdentifierAsString) {
					if ($aConverter == new identifier\converter\toString\raw)
					{
						$aRecipient->stringIs($identifierAsAstring);
						$aRecipient->stringIs($otherIdentifierAsString);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfPhpNamespaceAsStringIs($namespace, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->withArguments('\\' . $identifierAsAstring . '\\' . $otherIdentifierAsString)
							->once
		;
	}
}
