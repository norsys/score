<?php namespace norsys\score\composer\autoload;

use norsys\score\composer\{
	autoload,
	autoload\type,
	part\object,
	part\name,
	part\container\fifo
};

class dev extends object\named
	implements
		autoload
{
	function __construct(type... $types)
	{
		parent::__construct(new name\autoload\dev, new fifo(... $types));
	}
}
