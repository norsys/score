<?php namespace norsys\score\php\test\isNotFalse;

use norsys\score\php\test;

class strictly
	implements test
{
	function recipientOfTestOnVariableIs($variable, test\recipient $recipient) :void
	{
		$recipient->booleanIs($variable !== false);
	}
}
