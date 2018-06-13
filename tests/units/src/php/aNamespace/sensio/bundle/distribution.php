<?php namespace norsys\score\tests\units\php\aNamespace\sensio\bundle;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\{ tests\units\php\aNamespace, php\identifier };
use mock\norsys\score as mockOfScore;

class distribution extends aNamespace
{
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
							[ new identifier\sensio, $recipient ],
							[ new identifier\bundle, $recipient ],
							[ new identifier\distribution\bundle, $recipient ],
							[ $identifier, $recipient ],
							[ $otherIdentifier, $recipient ]
						]
					)
		;
	}
}
