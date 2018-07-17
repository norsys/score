<?php namespace norsys\score\php\string\recipient\prefix;

use norsys\score\php\{
	string\recipient\prefix,
	string\recipient
};

class dot extends prefix
{
	function __construct(recipient $recipient)
	{
		parent::__construct('.', $recipient);
	}
}
