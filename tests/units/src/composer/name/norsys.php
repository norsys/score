<?php namespace norsys\score\tests\units\composer\name;

require __DIR__ . '/../../../runner.php';

use norsys\score\{ tests\units, composer\part\name\name, composer\part\text\any as text };
use mock\norsys\score as mockOfScore;

class norsys extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\name')
		;
	}

	function testKeyValueSerializerIs()
	{
		$this
			->given(
				$this->newTestedInstance($project = new mockOfScore\composer\depedency\name\project),
				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($project))
				->mock($serializer)
					->receive('textToSerializeWithNameIs')
						->never

			->given(
				$projectAsString = uniqid(),
				$this->calling($project)->recipientOfStringIs = function($aRecipient) use ($projectAsString) {
					$aRecipient->stringIs($projectAsString);
				}
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($project))
				->mock($serializer)
					->receive('textToSerializeWithNameIs')
						->withArguments(new name, new text('norsys/' . $projectAsString))
							->once
		;
	}
}
