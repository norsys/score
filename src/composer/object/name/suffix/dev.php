<?php namespace norsys\score\composer\object\name\suffix;

use norsys\score\composer\object\name;

class dev extends name\any
{
	function __construct()
	{
		parent::__construct('-dev');
	}
}
