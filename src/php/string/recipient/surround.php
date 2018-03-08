<?php namespace norsys\score\php\string\recipient;

use norsys\score\php\string\{ recipient, recipient\prefix, recipient\suffix };

class surround extends prefix
{
	function __construct(string $surround, recipient $recipient)
	{
		parent::__construct($surround, new suffix($surround, $recipient));
	}
}
