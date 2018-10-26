<?php namespace norsys\score\php\string\provider;

use norsys\score\{
	php,
	php\string\provider,
	php\string\recipient
};

class functor extends block
{
	function __construct(callable $callable)
	{
		parent::__construct(new php\block\functor($callable));
	}
}
