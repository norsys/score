<?php namespace norsys\score\composer\depedency\version\dev;

use norsys\score\vcs\branch;

class master extends any
{
	function __construct()
	{
		parent::__construct(new branch\master);
	}
}
