<?php namespace norsys\score\composer\depedency\version\constraint\operator;

use norsys\score\{ composer\depedency\version\constraint\operator, php };

class conjunction extends operator\any
{
	function __construct()
	{
		parent::__construct(' ');
	}
}
