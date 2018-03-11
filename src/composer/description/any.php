<?php namespace norsys\score\composer\description;

use norsys\score\composer\description;
use norsys\score\composer\part\{ name, text\any as text };
use norsys\score\serializer\keyValue as serializer;

class any
	implements
		description
{
	private
		$description
	;

	function __construct(string $description)
	{
		$this->description = $description;
	}

	function keyValueSerializerIs(serializer $serializer) :void
	{
		$serializer
			->textToSerializeWithNameIs(
				new name\description,
				new text($this->description)
			)
		;
	}
}
