<?php namespace norsys\score\php\test\recipient\ifTrue;

use norsys\score\php\{ test\recipient, block };

class exception extends recipient\ifTrue
{
	function __construct(\exception $exception)
	{
		parent::__construct(new block\exception($exception));
	}
}
