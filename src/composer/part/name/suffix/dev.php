<?php namespace norsys\score\composer\part\name\suffix;

use norsys\score\composer\part\name\any;

class dev extends any
{
	function __construct()
	{
		parent::__construct('-dev');
	}
}
