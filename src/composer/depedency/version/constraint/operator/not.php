<?php namespace norsys\score\composer\depedency\version\constraint\operator;

use norsys\score\{ composer\depedency\version\constraint\operator, php };

class not extends operator\any
{
	function __construct()
	{
		parent::__construct('!=');
	}
}
