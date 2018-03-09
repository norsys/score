<?php namespace norsys\score\composer\object\name;

use norsys\score\{ composer\object\name, php };

class required extends php\string\any
	implements
		name
{
	function __construct()
	{
		parent::__construct('require');
	}
}
