<?php namespace norsys\score\composer\scripts;

use norsys\score\composer\{ scripts, part\entity, part\name, part\container\fifo };

class any extends entity\named
	implements
		scripts
{
	function __construct(part... $parts)
	{
		parent::__construct(new name\scripts, new fifo(... $parts));
	}
}
