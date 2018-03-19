<?php namespace norsys\score\composer\part\container;

use norsys\score\composer\part;
use norsys\score\composer\autoload\psr4\mapping;
use norsys\score\serializer\{ keyValue as serializer, keyValue\part\container };

class fifo
	implements
		part
{
	private
		$parts
	;

	function __construct(part... $parts)
	{
		$this->parts = $parts;
	}

	function keyValueSerializerIs(serializer $serializer) :void
	{
		(new container\fifo(... $this->parts))->keyValueSerializerIs($serializer);
	}
}
