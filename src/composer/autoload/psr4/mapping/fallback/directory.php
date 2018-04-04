<?php namespace norsys\score\composer\autoload\psr4\mapping\fallback;

use norsys\score\composer\autoload\psr4\mapping\{ any, prefix\fallback };
use norsys\score\composer\fs\path;

class directory extends any
{
	function __construct(path $path)
	{
		parent::__construct(new fallback, $path);
	}
}
