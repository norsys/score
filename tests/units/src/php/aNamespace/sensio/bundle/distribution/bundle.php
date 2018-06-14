<?php namespace norsys\score\tests\units\php\aNamespace\sensio\bundle\distribution;

require __DIR__ . '/../../../../../../runner.php';

use norsys\score\{ tests\units\php\aNamespace, php\identifier };
use mock\norsys\score as mockOfScore;

class bundle extends aNamespace
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
							[ new identifier\sensio\bundle, $recipient ],
							[ new identifier\sensio\bundle\distribution\bundle, $recipient ],
							[ $identifier, $recipient ],
							[ $otherIdentifier, $recipient ]
						]
					)
		;
	}
}
