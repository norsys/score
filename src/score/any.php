<?php namespace norsys\score\score;

use norsys\score\{ score, composer\part, serializer\keyValue as serializer };

class any
	implements
		score
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
