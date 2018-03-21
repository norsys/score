<?php namespace norsys\score\php\string\recipient;

use norsys\score\php;

class suffix extends suffix\provider
{
	function __construct(string $suffix, php\string\recipient $recipient)
	{
		parent::__construct(new php\string\any($suffix), $recipient);
	}
}
