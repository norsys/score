<?php namespace norsys\score\php\test\variable;

use norsys\score\php\test;

class any
{
	private
		$variable,
		$test
	;

	function __construct($variable, test $test)
	{
		$this->variable = $variable;
		$this->test = $test;
	}

	function recipientOfTestIs(test\recipient $recipient) :void
	{
		$this->test
			->recipientOfTestOnVariableIs(
				$this->variable,
				$recipient
			)
		;
	}
}
