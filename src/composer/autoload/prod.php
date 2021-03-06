<?php namespace norsys\score\composer\autoload;

use norsys\score\composer\{
	autoload,
	autoload\type,
	part\entity,
	part\name,
	part\container\fifo
};

class prod extends entity\named
	implements
		autoload
{
	function __construct(type... $types)
	{
		parent::__construct(new name\autoload, new fifo(... $types));
	}
}
