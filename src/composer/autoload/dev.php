<?php namespace norsys\score\composer\autoload;

use norsys\score\composer\{
	autoload,
	autoload\type,
	part\entity,
	part\name,
	part\container\fifo
};

class dev extends entity\named
	implements
		autoload
{
	function __construct(type... $types)
	{
		parent::__construct(new name\autoload\dev, new fifo(... $types));
	}
}
