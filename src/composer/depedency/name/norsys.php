<?php namespace norsys\score\composer\depedency\name;

use norsys\score\composer\depedency\name\{ any as name, project, vendor };

class norsys
	extends name
{
	function __construct(project $project)
	{
		parent::__construct(new vendor\norsys, $project);
	}
}
