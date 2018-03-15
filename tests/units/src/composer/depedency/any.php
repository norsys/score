<?php namespace norsys\score\tests\units\composer\depedency;

require __DIR__ . '/../../../runner.php';

use norsys\score\{ tests\units, serializer\keyValue\name, serializer\keyValue\text };
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\depedency')
		;
	}

	function testRecipientOfComposerDepedencyName()
	{
		$this
			->given(
				$this->newTestedInstance(
					$name = new mockOfScore\composer\depedency\name,
					$version = new mockOfScore\composer\depedency\version
				),
				$recipient = new mockOfScore\composer\depedency\name\recipient
			)
			->if(
				$this->testedInstance->recipientOfComposerDepedencyNameIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($name, $version))
				->mock($recipient)
					->receive('nameOfComposerDepedencyIs')
						->withArguments($name)
							->once
		;
	}

	function testRecipientOfComposerDepedencyVersion()
	{
		$this
			->given(
				$this->newTestedInstance(
					$name = new mockOfScore\composer\depedency\name,
					$version = new mockOfScore\composer\depedency\version
				),
				$recipient = new mockOfScore\composer\depedency\version\recipient
			)
			->if(
				$this->testedInstance->recipientOfComposerDepedencyVersionIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($name, $version))
				->mock($recipient)
					->receive('versionOfComposerDepedencyIs')
						->withArguments($version)
							->once
		;
	}

	function testKeyValueSerializerIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$name = new mockOfScore\composer\depedency\name,
					$version = new mockOfScore\composer\depedency\version
				),
				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($name, $version))
				->mock($serializer)
					->receive('textToSerializeWithNameIs')
						->withArguments($name, $version)
							->once
		;
	}
}
