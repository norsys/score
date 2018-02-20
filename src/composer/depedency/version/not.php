<?php namespace norsys\score\composer\depedency\version;

use norsys\score\composer\depedency\{ version\constraint, version };

class not extends constraint\any
{
	function __construct(version $version)
	{
		parent::__construct(new constraint\operator\not, $version);
	}
}
