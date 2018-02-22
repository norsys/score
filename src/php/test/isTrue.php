<?php namespace norsys\score\php\test;

use norsys\score\php\test;

class isTrue
	implements
		test
{
	function recipientOfTestOnVariableIs($variable, recipient $recipient) :void
	{
		$recipient->booleanIs($variable == true);
	}
}
