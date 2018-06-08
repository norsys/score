<?php namespace norsys\score\tests\units\php\string\recipient\buffer;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class prefix extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\string\recipient')
			->implements('norsys\score\php\string\provider')
		;
	}

	function testStringIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$prefix = uniqid()
				),
				$string = uniqid()
			)
			->if(
				$this->testedInstance->stringIs($string)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($prefix, $prefix . $string))

			->given(
				$this->newTestedInstance(
					$prefix,
					$inBuffer = uniqid()
				)
			)
			->if(
				$this->testedInstance->stringIs($string)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($prefix, $inBuffer . $prefix . $string))
		;
	}

	function testRecipientOfStringIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$prefix = uniqid()
				),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($prefix))
				->mock($recipient)
					->receive('stringIs')
						->never

			->given(
				$this->newTestedInstance($prefix, $string = uniqid())
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($prefix, $string))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($string)
							->once
		;
	}
}
