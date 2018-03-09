<?php namespace norsys\score\composer\required\any;

use norsys\score\composer\part\{ object\any, name };
use norsys\score\composer\depedency\container;
use norsys\score\serializer\keyValue as serializer;


class dev extends any
{
	function __construct(container $container)
	{
		parent::__construct(new name\required\dev, $container);
	}
}
