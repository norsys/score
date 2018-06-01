<?php namespace norsys\score\composer\name\norsys;

use norsys\score\composer\{ root\part, name\any as name, depedency, depedency\name\project\score as project };

class score extends name
	implements
		part
{
	function __construct()
	{
		parent::__construct(new depedency\name\norsys(new project));
	}
}
