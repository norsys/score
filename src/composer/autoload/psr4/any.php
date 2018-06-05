<?php namespace norsys\score\composer\autoload\psr4;

use norsys\score\composer\{ autoload\psr4, part\name\autoload };
use norsys\score\serializer\{ keyValue as serializer, keyValue\part\container\fifo };

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
				new autoload\psr4,
				new fifo(... $this->mappings)
			)
		;
	}
}
