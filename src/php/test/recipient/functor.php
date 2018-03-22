<?php namespace norsys\score\php\test\recipient;

use norsys\score\php\{ test\recipient, block };

class functor extends block\functor
	implements
		recipient
{
	function booleanIs(bool $boolean) :void
	{
		parent::blockArgumentsAre($boolean);
	}
}
