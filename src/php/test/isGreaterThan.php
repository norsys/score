<?php namespace norsys\score\php\test;

use norsys\score\php\test;

class isGreaterThan
	implements
		test
{
	private
		$reference
	;

	function __construct($reference)
	{
		$this->reference = $reference;
	}

	function recipientOfTestOnVariableIs($variable, test\recipient $recipient) :void
	{
		$recipient->booleanIs($variable > $this->reference);
	}
}
