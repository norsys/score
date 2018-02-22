<?php namespace norsys\score\php\test\recipient;

use norsys\score\php\test;

class not
	implements
		test\recipient
{
	private
		$recipient
	;

	function __construct(test\recipient $recipient)
	{
		$this->recipient = $recipient;
	}

	function booleanIs(bool $bool) :void
	{
		$this->recipient->booleanis(! $bool);
	}
}
