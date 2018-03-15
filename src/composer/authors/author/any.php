<?php namespace norsys\score\composer\authors\author;

use norsys\score\composer\{ authors\author, part, part\object\any as object };
use norsys\score\serializer\keyValue as serializer;

class any
	implements
		author
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
		$serializer->objectInJsonArrayIs(new serializer\part\container\fifo(... $this->parts));
	}
}
