<?php namespace norsys\score\tests\units\composer\fs\path;

require __DIR__ . '/../../../../runner.php';

use norsys\score\{ tests\units\composer\fs\path, composer\part\text\any as text };
use mock\norsys\score as mockOfScore;

class file extends path
{
	function testRecipientOfStringIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$filename = new mockOfScore\composer\fs\path\filename,
					$otherFilename = new mockOfScore\composer\fs\path\filename,
					$anOtherFilename = new mockOfScore\composer\fs\path\filename
				),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($filename, $otherFilename, $anOtherFilename))
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$this->providerHasString($anOtherFilename, $anOtherFilenameAsString = uniqid())
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($filename, $otherFilename, $anOtherFilename))
				->mock($recipient)
					->receive('stringIs')
					->withArguments('./' . $anOtherFilenameAsString)
							->once

			->given(
				$this->providerHasString($filename, $filenameAsString = uniqid()),
				$this->providerHasString($anOtherFilename, $anOtherFilenameAsString = uniqid())
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($filename, $otherFilename, $anOtherFilename))
				->mock($recipient)
					->receive('stringIs')
					->withArguments('./' . $filenameAsString . '/' . $anOtherFilenameAsString)
							->once

			->given(
				$this->providerHasString($filename, $filenameAsString = uniqid()),
				$this->providerHasString($otherFilename, $otherFilenameAsString = uniqid()),
				$this->providerHasString($anOtherFilename, $anOtherFilenameAsString = uniqid())
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($filename, $otherFilename, $anOtherFilename))
				->mock($recipient)
					->receive('stringIs')
					->withArguments('./' . $filenameAsString . '/' . $otherFilenameAsString . '/' . $anOtherFilenameAsString)
							->once
		;
	}

	function testKeyValueSerializerIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$filename = new mockOfScore\composer\fs\path\filename,
					$otherFilename = new mockOfScore\composer\fs\path\filename,
					$anOtherFilename = new mockOfScore\composer\fs\path\filename
				),

				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($filename, $otherFilename, $anOtherFilename))
				->mock($serializer)
					->wasNotCalled

			->given(
				$this->providerHasString($anOtherFilename, $anOtherFilenameAsString = uniqid())
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($filename, $otherFilename, $anOtherFilename))
				->mock($serializer)
					->receive('textToSerializeIs')
					->withArguments(new text('./' . $anOtherFilenameAsString))
							->once

			->given(
				$this->providerHasString($filename, $filenameAsString = uniqid())
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($filename, $otherFilename, $anOtherFilename))
				->mock($serializer)
					->receive('textToSerializeIs')
					->withArguments(new text('./' . $filenameAsString . '/' . $anOtherFilenameAsString))
							->once

			->given(
				$this->providerHasString($otherFilename, $otherFilenameAsString = uniqid())
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($filename, $otherFilename, $anOtherFilename))
				->mock($serializer)
					->receive('textToSerializeIs')
					->withArguments(new text('./' . $filenameAsString . '/' . $otherFilenameAsString . '/' . $anOtherFilenameAsString))
							->once
		;
	}
}
