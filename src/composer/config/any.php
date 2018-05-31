<?php namespace norsys\score\composer\config;

use norsys\score\composer\{ part, config\option };
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
		$serializer->objectToSerializeWithNameIs(new part\name\config, new part\container\fifo(... $this->options));
	}
}
