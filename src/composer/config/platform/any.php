<?php namespace norsys\score\composer\config\platform;

use norsys\score\composer\{
	config\option,
	part\entity,
	part\name\config\platform,
	part\container\fifo
};

class any extends entity\named
	implements
		option
{
	function __construct(constraint... $constraints)
	{
		parent::__construct(
			new platform,
			new fifo(... $constraints)
		);
	}
}
