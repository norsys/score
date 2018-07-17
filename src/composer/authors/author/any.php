<?php namespace norsys\score\composer\authors\author;

use norsys\score\composer\{ authors\author, authors\author\part };
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
		$serializer
			->objectToSerializeIs(
				new serializer\part\container\fifo(
					... $this->parts
				)
			)
		;
	}
}
