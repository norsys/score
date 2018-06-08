<?php namespace norsys\score\php\string\recipient;

use norsys\score\php\string\{ recipient, provider, recipient\suffix, recipient\functor };
use norsys\score\php\test\{ variable\defined, recipient\ifTrue\functor as ifTrue };

class buffer extends buffer\prefix
{
	function __construct(string $string = null)
	{
		parent::__construct('', $string);
	}
}
