<?php namespace norsys\score\php\string\recipient;

use norsys\score\php\string\{ recipient, recipient\prefix, recipient\suffix };

class surround extends prefix
{
	function __construct(string $left, string $right, recipient $recipient)
	{
		parent::__construct($left, new suffix($right, $recipient));
	}
}
