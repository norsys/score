<?php namespace norsys\score\composer\scripts\event\post\install;

use norsys\score\composer\{
	scripts\event,
	part\name
};

class cmd extends name\any
	implements
		event
{
	function __construct()
	{
		parent::__construct('post-install-cmd');
	}
}
