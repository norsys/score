<?php namespace norsys\score\composer\config\platform;

use norsys\score\composer\{ config\option, part };
use norsys\score\serializer\keyValue as serializer;

class any extends part\object\any
	implements
		option
{
	function __construct(constraint... $constraints)
	{
		parent::__construct(new part\name\config\platform, new part\container\fifo(... $constraints));
	}
}
