<?php namespace norsys\score\tests\units\php\string\recipient;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;

class vardump extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\string\recipient')
		;
	}

	function testStringIs()
	{
		$this
			->given(
				$this->newTestedInstance
			)
			->if(
				$string = uniqid()
			)
			->then
				->output(function() use ($string) { $this->testedInstance->stringIs($string); })
					->isEqualTo(call_user_func_array(function($string) { ob_start(); var_dump($string); return ob_get_clean(); }, [ $string ]))
		;
	}
}
