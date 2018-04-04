<?php namespace norsys\score\composer\autoload\psr4\mapping\norsys;

use norsys\score\composer\autoload\psr4\mapping\{ any, prefix };
use norsys\score\composer\fs\path\directory\src;

class score extends any
{
	function __construct()
	{
		parent::__construct(new prefix\norsys\score, new src);
	}
}
