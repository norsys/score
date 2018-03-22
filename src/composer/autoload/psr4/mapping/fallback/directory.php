<?php namespace norsys\score\composer\autoload\psr4\mapping\fallback;

use norsys\score\composer\autoload\psr4\{ mapping\any, mapping, mapping\prefix\fallback };

class directory extends any
{
	function __construct(mapping\directory $directory)
	{
		parent::__construct(new fallback, $directory);
	}
}
