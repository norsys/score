<?php namespace norsys\score\composer\autoload;

use norsys\score\score;
use norsys\score\composer\{ autoload, part, part\object, part\name };

class dev extends object\any
	implements
		autoload,
		score\part
{
	function __construct(part $part)
	{
		parent::__construct(new name\autoload\dev, $part);
	}
}
