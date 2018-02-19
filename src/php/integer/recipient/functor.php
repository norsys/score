<?php namespace norsys\score\php\integer\recipient;

use norsys\score\php\{ integer, block };

class functor extends block\functor
	implements
		integer\recipient
{
	function integerIs(int $integer) :void
	{
		parent::blockArgumentsAre($integer);
	}
}
