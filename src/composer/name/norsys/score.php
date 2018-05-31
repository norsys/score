<?php namespace norsys\score\composer\name\norsys;

use norsys\score\score\part;
use norsys\score\composer\name\any as name;
use norsys\score\composer\depedency;
use norsys\score\composer\depedency\name\project\score as project;

class score extends name
	implements
		part

{
	function __construct()
	{
		parent::__construct(new depedency\name\norsys(new project));
	}
}
