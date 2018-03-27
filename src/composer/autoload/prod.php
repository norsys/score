<?php namespace norsys\score\composer\autoload;

use norsys\score\composer\{ autoload, part, part\object, part\name, part\container\fifo };

class prod extends object\any
	implements
		autoload
{
	function __construct(part... $parts)
	{
		parent::__construct(new name\autoload, new fifo(... $parts));
	}
}
