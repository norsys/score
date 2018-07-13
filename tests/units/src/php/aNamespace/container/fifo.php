<?php namespace norsys\score\tests\units\php\aNamespace\container;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class fifo extends units\test
{
	function testRecipientOfPhpIdentifierIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$recipient = new mockOfScore\php\identifier\recipient,

				$identifiers = null,
				$this->calling($recipient)->phpIdentifierIs = function($anIdentifier) use (& $identifiers) {
					$identifiers[] = $anIdentifier;
				}
			)
			->if(
				$this->testedInstance->recipientOfPhpIdentifierIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->variable($identifiers)
					->isNull

			->given(
				$this->newTestedInstance(
					$identifier = new mockOfScore\php\identifier,
					$otherIdentifier = new mockOfScore\php\identifier
				)
			)
			->if(
				$this->testedInstance->recipientOfPhpIdentifierIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($identifier, $otherIdentifier))
				->array($identifiers)
					->isEqualTo([ $identifier, $otherIdentifier ])
		;
	}
}
