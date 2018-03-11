<?php namespace norsys\score\composer\name;

use norsys\score\composer\depedency\{ name, name\project };

class norsys extends any
{
	function __construct(project $project)
	{
		parent::__construct(new name\norsys($project));
	}
}
