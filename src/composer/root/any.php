<?php namespace norsys\score\composer\root;

use norsys\score\{ composer\root, composer\root\part, serializer\keyValue as serializer };

class any
	implements
		root
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
				new serializer\part\container\fifo(...$this->parts)
			)
		;
	}
}
