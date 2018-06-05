<?php namespace norsys\score\composer\part\anArray;

use norsys\score\composer\{ part, part\anArray, part\name };
use norsys\score\serializer\keyValue as serializer;

class named
	implements
		anArray
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
		$serializer->arrayToSerializeWithNameIs($this->name, $this->part);
	}
}
