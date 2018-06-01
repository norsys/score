<?php namespace norsys\score\serializer\keyValue\part;

use norsys\score\serializer\{
	keyValue\part,
	keyValue as serializer
};

class anArray
	implements
		part
{
	private
		$part
	;

	function __construct(part $part)
	{
		$this->part = $part;
	}

	function keyValueSerializerIs(serializer $serializer) :void
	{
		$serializer->arrayToSerializeIs($this->part);
	}
}
