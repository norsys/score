<?php namespace norsys\score\php\test\isTrue;

use norsys\score\php\{ test, test\recipient };

class strictly
	implements
		test
{
	function recipientOfTestOnVariableIs($variable, recipient $recipient) :void
	{
		$recipient->booleanIs($variable === true);
	}
}
