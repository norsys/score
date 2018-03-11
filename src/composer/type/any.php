<?php namespace norsys\score\composer\type;

use norsys\score\composer\type;
use norsys\score\composer\part\name;
use norsys\score\composer\part\text\any as text;
use norsys\score\serializer\keyValue as serializer;

class any
	implements
		type
{
	function __construct(string $type)
	{
		$this->type = $type;
	}

	function keyValueSerializerIs(serializer $serializer) :void
	{
		$serializer
			->textToSerializeWithNameIs(
				new name\type,
				new text($this->type)
			)
		;
	}
}
