<?php namespace norsys\score\tests\units\composer\depedency\version\semver\number\recipient;

require __DIR__ . '/../../../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class functor extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\depedency\version\semver\number\recipient')
		;
	}

	function testSemverVersionNumberIs()
	{
		$this
			->given(
				$this->newTestedInstance($callable = function() use (& $arguments) { $arguments = func_get_args(); }),
				$number = new mockOfScore\composer\depedency\version\semver\number
			)
			->if(
				$this->testedInstance->semverVersionNumberIs($number)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($arguments)
					->isEqualTo([ $number ])
		;
	}
}
