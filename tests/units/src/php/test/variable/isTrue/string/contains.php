<?php namespace norsys\score\tests\units\php\test\variable\isTrue\string;

require __DIR__ . '/../../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class contains extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\test\variable')
		;
	}

	function testRecipientOfTestIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					'foo',
					'a'
				),
				$recipient = new mockOfScore\php\test\recipient
			)
			->if(
				$this->testedInstance->recipientOfTestIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance('foo', 'a'))
				->mock($recipient)
					->receive('booleanIs')
						->withArguments(false)
							->once

			->given(
				$this->newTestedInstance(
					'foo',
					'f'
				)
			)
			->if(
				$this->testedInstance->recipientOfTestIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance('foo', 'f'))
				->mock($recipient)
					->receive('booleanIs')
						->withArguments(true)
							->once

			->given(
				$this->newTestedInstance(
					'foo',
					'o'
				)
			)
			->if(
				$this->testedInstance->recipientOfTestIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance('foo', 'o'))
				->mock($recipient)
					->receive('booleanIs')
						->withArguments(true)
							->twice

			->given(
				$this->newTestedInstance(
					'foo',
					'x',
					'f'
				)
			)
			->if(
				$this->testedInstance->recipientOfTestIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance('foo', 'x', 'f'))
				->mock($recipient)
					->receive('booleanIs')
						->withArguments(true)
							->thrice
		;
	}
}
