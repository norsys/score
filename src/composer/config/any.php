<?php namespace norsys\score\composer\config;

use norsys\score\{ composer\config, composer\part, serializer\keyValue as serializer };

class any
	implements
		config
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
				new serializer\part\object(...$this->parts)
			)
		;
	}
}
