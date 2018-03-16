<?php namespace norsys\score\tests\units\composer\license;

require __DIR__ . '/../../../runner.php';

use norsys\score\{ tests\units, composer\part\name\license, composer\part\text\any as text };
use mock\norsys\score as mockOfScore;

class conjunctive extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\license')
		;
	}

	function testKeyValueSerializerIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$license = new mockOfScore\composer\license\name,
					$otherLicense = new mockOfScore\composer\license\name,
					$anotherLicense = new mockOfScore\composer\license\name
				),
				$serializer = new mockOfScore\serializer\keyValue,

				$licenseAsString = uniqid(),
				$this->calling($license)->recipientOfStringIs = function($aRecipient) use ($licenseAsString) {
					$aRecipient->stringIs($licenseAsString);
				},

				$otherLicenseAsString = uniqid(),
				$this->calling($otherLicense)->recipientOfStringIs = function($aRecipient) use ($otherLicenseAsString) {
					$aRecipient->stringIs($otherLicenseAsString);
				},

				$anotherLicenseAsString = uniqid(),
				$this->calling($anotherLicense)->recipientOfStringIs = function($aRecipient) use ($anotherLicenseAsString) {
					$aRecipient->stringIs($anotherLicenseAsString);
				}
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($license, $otherLicense, $anotherLicense))
				->mock($serializer)
				->receive('textToSerializeWithNameIs')
					->withArguments(new license, new text('(' . $licenseAsString . ' and ' . $otherLicenseAsString . ' and ' . $anotherLicenseAsString . ')'))
						->once
		;
	}
}
