<?php namespace norsys\score\composer\config\platform;

use norsys\score\composer\{
	config\option,
	part\object,
	part\name\config\platform,
	part\container\fifo
};

class any extends object\any
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
