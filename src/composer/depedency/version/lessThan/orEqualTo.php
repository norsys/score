<?php namespace norsys\score\composer\depedency\version\lessThan;

use norsys\score\composer\depedency\{ version\constraint, version };

class orEqualTo extends constraint\any
{
	function __construct(version $version)
	{
		parent::__construct(new constraint\operator\orEqualTo(new constraint\operator\lessThan), $version);
	}
}
