<?php namespace norsys\score\tests\units\php\string;

require __DIR__ . '/../../../runner.php';

use norsys\score\tests\units\php\string\provider;
use mock\norsys\score as mockOfScore;

class lowercase extends provider
{
	/**
	 * @dataProvider stringProvider
	 */
	function testRecipientOfStringIs_withString($string)
	{
		$this
			->given(
				$this->newTestedInstance($string),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($string))
				->mock($recipient)
					->receive('stringIs')
						->withArguments('foo')
							->once
		;
	}

	protected function stringProvider()
	{
		return [
			'foo',
			'Foo',
			'fOo',
			'foO',
			'FOo',
			'fOO',
			'FoO',
			'FOO'
		];
	}
}
