<?php namespace norsys\score\composer\authors;

use norsys\score\composer\{ part, part\name\authors };
use norsys\score\serializer\{ keyValue as serializer, keyValue\part\container\fifo, keyValue\part\anArray };

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
			->partToSerializeWithNameIs(
				new authors,
				new anArray(new fifo(... $this->authors))
			)
		;
	}
}
