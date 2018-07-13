<?php namespace norsys\score\tests\units\php\string\recipient\decorator;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class lowercase extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\string\recipient')
		;
	}

	/**
	 * @dataProvider stringProvider
	 */
	function testStringIs($string)
	{
		$this
			->given(
				$this->newTestedInstance(
					$recipient = new mockOfScore\php\string\recipient
				)
			)
			->if(
				$this->testedInstance->stringIs($string)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($recipient))
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
