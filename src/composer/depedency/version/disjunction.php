<?php namespace norsys\score\composer\depedency\version;

use norsys\score\{ composer\depedency\version, php };

class disjunction extends constraints
{
	function __construct(version $version1, version $version2, version... $versions)
	{
		parent::__construct(new version\constraint\operator\disjunction, $version1, $version2, ... $versions);
	}
}
