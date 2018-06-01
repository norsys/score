<?php namespace norsys\score\composer\autoload\psr4;

use norsys\score\composer\autoload\psr4;
use norsys\score\composer\part\name;
use norsys\score\serializer\keyValue as serializer;

class any
	implements
		psr4
{
	private
		$mappings
	;

	function __construct(psr4\mapping... $mappings)
	{
		$this->mappings = $mappings;
	}

	function keyValueSerializerIs(serializer $serializer) :void
	{
		$serializer
			->objectToSerializeWithNameIs(
				new name\autoload\psr4,
				new serializer\part\container\fifo(... $this->mappings)
			)
		;
	}
}
