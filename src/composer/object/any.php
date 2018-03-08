<?php namespace norsys\score\composer\object;

use norsys\score\composer\object;
use norsys\score\serializer\{ keyValue as serializer, keyValue\part };

class any
	implements
		object
{
	private
		$key,
		$part
	;

	function __construct(string $key, part $part)
	{
		$this->key = $key;
		$this->part = $part;
	}

	function keyValueSerializerIs(serializer $serializer) :void
	{
		$serializer->objectToSerializeAtKeyIs($this->key, $this->part);
	}
}
