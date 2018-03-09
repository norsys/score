<?php namespace norsys\score\composer\object;

use norsys\score\composer\object;
use norsys\score\serializer\{ keyValue as serializer, keyValue\part, keyValue\name };

class any
	implements
		object
{
	private
		$name,
		$part
	;

	function __construct(name $name, part $part)
	{
		$this->name = $name;
		$this->part = $part;
	}

	function keyValueSerializerIs(serializer $serializer) :void
	{
		$serializer->objectToSerializeWithNameIs($this->name, $this->part);
	}
}
