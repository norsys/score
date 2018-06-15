<?php namespace norsys\score\composer\autoload\psr4\mapping\fallback\directory;

use norsys\score\composer\{
	fs,
	autoload\psr4\mapping\fallback\directory
};

class src extends directory
{
	function __construct()
	{
		parent::__construct(new fs\path\directory\src);
	}
}
