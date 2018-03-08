<?php namespace norsys\score\composer\required;

use norsys\score\composer\{ object, depedency\container };
use norsys\score\serializer\keyValue as serializer;

class any extends object\any
{
	function __construct(container $container)
	{
		parent::__construct('require', $container);
	}
}
