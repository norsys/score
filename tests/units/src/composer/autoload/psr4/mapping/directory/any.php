<?php namespace norsys\score\tests\units\composer\autoload\psr4\mapping\directory;

require __DIR__ . '/../../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\autoload\psr4\mapping\directory')
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
}
