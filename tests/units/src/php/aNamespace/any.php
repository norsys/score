<?php namespace norsys\score\tests\units\php\aNamespace;

require __DIR__ . '/../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\aNamespace')
		;
	}

	function testRecipientOfIdentifierFromToStringConverterIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$identifier = new mockOfScore\php\identifier,
					$otherIdentifier = new mockOfScore\php\identifier
				),
				$converter = new mockOfScore\php\identifier\converter\toString,
				$recipient = new mockOfScore\php\string\recipient,

				$this->calling($converter)->recipientOfPhpIdentifierAsStringIs = function($anIdentifier, $aRecipient) use (& $identifiers) {
					$identifiers[] = [ $anIdentifier, $aRecipient ];
				}
			)
			->if(
				$this->testedInstance->recipientOfIdentifierFromToStringConverterIs($converter, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($identifier, $otherIdentifier))
				->array($identifiers)
					->isEqualTo([
							[ $identifier, $recipient ],
							[ $otherIdentifier, $recipient ]
						]
					)
		;
	}
}
