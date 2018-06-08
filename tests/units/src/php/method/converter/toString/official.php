<?php namespace norsys\score\tests\units\php\method\converter\toString;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\{ tests\units, php };
use mock\norsys\score as mockOfScore;

class official extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\method\converter\toString')
		;
	}

	function testRecipientOfPhpMethodAsStringIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$method = new mockOfScore\php\method,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfPhpMethodAsStringIs($method, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$fullyQualifiedClassNameAsString = uniqid(),
				$this->calling($method)->recipientOfPhpClassNameFromToStringConverterIs = function($aConverter, $aRecipient) use ($fullyQualifiedClassNameAsString) {
					if ($aConverter == new php\aClass\name\converter\toString\fqcn)
					{
						$aRecipient->stringIs($fullyQualifiedClassNameAsString);
					}
				},

				$methodNameAsString = uniqid(),
				$this->calling($method)->recipientOfPhpMethodNameFromToStringConverterIs = function($aConverter, $aRecipient) use ($methodNameAsString) {
					if ($aConverter == new php\method\name\converter\toString\raw)
					{
						$aRecipient->stringIs($methodNameAsString);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfPhpMethodAsStringIs($method, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->withArguments($fullyQualifiedClassNameAsString . '::' . $methodNameAsString)
							->once
		;
	}
}
