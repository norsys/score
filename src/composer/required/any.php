<?php namespace norsys\score\composer\required;

use norsys\score\composer\{ part\object, part\name, depedency\container };
use norsys\score\serializer\keyValue as serializer;

class any extends object\any
{
	function __construct(container $container)
	{
		parent::__construct(new name\required, $container);
	}
}
