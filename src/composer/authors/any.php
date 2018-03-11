<?php namespace norsys\score\composer\authors;

use norsys\score\composer\{ part, part\name\authors };
use norsys\score\serializer\{ keyValue as serializer, keyValue\part\container\fifo };

class any
	implements
		part
{
	private
		$authors
	;

	function __construct(author... $authors)
	{
		$this->authors = $authors;
	}

	function keyValueSerializerIs(serializer $serializer) :void
	{
		$serializer
			->arrayToSerializeWithNameIs(
				new authors,
				new fifo(... $this->authors)
			)
		;
	}
}
