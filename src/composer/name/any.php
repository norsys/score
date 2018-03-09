<?php namespace norsys\score\composer\name;

use norsys\score\composer\{ name, part };
use norsys\score\serializer\keyValue as serializer;

class any
	implements
		name
{
	private
		$name
	;

	function __construct(string $name)
	{
		$this->name = $name;
	}

	function keyValueSerializerIs(serializer $serializer) :void
	{
		$serializer
			->textToSerializeWithNameIs(
				new part\name\name,
				new part\text\any($this->name)
			)
		;
	}
}
