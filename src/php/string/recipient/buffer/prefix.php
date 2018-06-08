<?php namespace norsys\score\php\string\recipient\buffer;

use norsys\score\php;

class prefix extends prefix\provider
{
	function __construct(string $prefix, string $buffer = null)
	{
		parent::__construct(new php\string\any($prefix), $buffer);
	}
}
