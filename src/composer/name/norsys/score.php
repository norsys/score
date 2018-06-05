<?php namespace norsys\score\composer\name\norsys;

use norsys\score\composer\{ root, name\any as name, depedency, depedency\name\project\score as project };

class score extends name
	implements
		root\name
{
	function __construct()
	{
		parent::__construct(new depedency\name\norsys(new project));
	}
}
