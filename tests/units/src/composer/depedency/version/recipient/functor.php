<?php namespace norsys\score\tests\units\composer\depedency\version\recipient;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class functor extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\depedency\version\recipient')
		;
	}

	function testVersionOfComposerDepedencyIs()
	{
		$this
			->given(
				$this->newTestedInstance($callable = function() use (& $arguments) { $arguments = func_get_args(); }),
				$version = new mockOfScore\composer\depedency\version
			)
			->if(
				$this->testedInstance->versionOfComposerDepedencyIs($version)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($arguments)
					->isEqualTo([ $version ])
		;
	}
}
