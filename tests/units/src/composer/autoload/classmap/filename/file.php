<?php namespace norsys\score\tests\units\composer\autoload\classmap\filename;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units\composer\autoload\classmap\filename;
use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class file extends filename
{
	function testClass()
	{
		parent::testClass();

		$this->testedClass
			->implements('norsys\score\composer\part\text')
		;
	}

	function testRecipientOfStringIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$filename = new mockOfScore\fs\path\filename,
					$otherFilename = new mockOfScore\fs\path\filename,
					$anOtherFilename = new mockOfScore\fs\path\filename
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
						->withArguments($filenameAsString . '/' . $otherFilenameAsString . '/' . $anOtherFilenameAsString)
							->once
		;
	}

	function testKeyValueSerializerIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$filename = new mockOfScore\fs\path\filename,
					$otherFilename = new mockOfScore\fs\path\filename,
					$anOtherFilename = new mockOfScore\fs\path\filename
				),

				$this->providerHasString($filename, $filenameAsString = uniqid()),
				$this->providerHasString($otherFilename, $otherFilenameAsString = uniqid()),
				$this->providerHasString($anOtherFilename, $anOtherFilenameAsString = uniqid()),

				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($filename, $otherFilename, $anOtherFilename))
				->mock($serializer)
					->receive('textToSerializeIs')
						->withArguments($this->testedInstance)
							->once
		;
	}
}
