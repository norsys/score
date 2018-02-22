<?php namespace norsys\score\php\test\recipient\ifTrue;

use norsys\score\{ php\test, php\block };

class functor extends test\recipient\ifTrue
{
	function __construct(callable $callable)
	{
		parent::__construct(new block\functor($callable));
	}
}
