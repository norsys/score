<?php namespace norsys\score\composer\part\entity;

use norsys\score\composer\{
	part,
	part\entity,
	part\name
};
use norsys\score\serializer\keyValue as serializer;

class named
	implements
		entity
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
