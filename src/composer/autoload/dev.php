<?php namespace norsys\score\composer\autoload;

use norsys\score\composer\{ autoload, part, part\object, part\name };

class dev extends object\any
	implements
		autoload
{
	function __construct(part $part)
	{
		parent::__construct(new name\autoload\dev, $part);
	}
}
