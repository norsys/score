<?php namespace norsys\score\composer\autoload\psr4\mapping\container;

use norsys\score\composer\part;
use norsys\score\composer\autoload\psr4\mapping;
use norsys\score\serializer\{ keyValue as serializer, keyValue\part\container\fifo };

class infinite
	implements
		part
{
	private
		$mappings
	;

	function __construct(mapping... $mappings)
	{
		$this->mappings = $mappings;
	}

	function keyValueSerializerIs(serializer $serializer) :void
	{
		(new fifo(... $this->mappings))->keyValueSerializerIs($serializer);
	}
}
