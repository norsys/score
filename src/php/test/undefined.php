<?php namespace norsys\score\php\test;

use norsys\score\php\test;

class undefined
	implements
		test
{
	function recipientOfTestOnVariableIs($variable, test\recipient $recipient) :void
	{
		$recipient->booleanIs($variable === null);
	}
}
