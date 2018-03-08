<?php namespace norsys\score\php\integer\unsigned\recipient;

use norsys\score\php\{ integer\unsigned\recipient, integer };

class functor extends integer\recipient\functor
	implements
		recipient
{
	function unsignedIntegerIs(int $integer) :void
	{
		parent::integerIs($integer);
	}
}
