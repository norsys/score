<?php namespace norsys\score\tests\units\composer\autoload\classmap\path;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units\composer\autoload\classmap\path;
use mock\norsys\score as mockOfScore;

class directory extends path
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
					$path = new mockOfScore\fs\path
				),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($path))
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$this->providerHasString($path, $pathAsString = uniqid())
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($path))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($pathAsString . '/')
							->once
		;
	}

	function testKeyValueSerializerIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$path = new mockOfScore\fs\path
				),

				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($path))
				->mock($serializer)
					->receive('textToSerializeIs')
						->withArguments($this->testedInstance)
							->once
		;
	}
}
