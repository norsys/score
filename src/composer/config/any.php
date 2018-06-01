<?php namespace norsys\score\composer\config;

use norsys\score\composer\root\part;
use norsys\score\composer\{ config\option, part\name, part\container };
use norsys\score\serializer\keyValue as serializer;

class any
	implements
		part
{
	private
		$options
	;

	function __construct(option... $options)
	{
		$this->options = $options;
	}

	function keyValueSerializerIs(serializer $serializer) :void
	{
		$serializer->objectToSerializeWithNameIs(new name\config, new container\fifo(... $this->options));
	}
}
