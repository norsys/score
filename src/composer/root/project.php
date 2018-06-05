<?php namespace norsys\score\composer\root;

use norsys\score\composer\{ root, type };

class project extends root\any
{
	function __construct(name $name, part... $parts)
	{
		parent::__construct(new type\project, $name, ... $parts);
	}
}
