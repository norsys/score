<?php namespace norsys\score\php\test\recipient\ifFalse;

use norsys\score\php\test\recipient\{
	not,
	ifTrue
};

class exception extends not
{
	function __construct(\exception $exception)
	{
		parent::__construct(new ifTrue\exception($exception));
	}
}
