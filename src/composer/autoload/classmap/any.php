<?php namespace norsys\score\composer\autoload\classmap;

use norsys\score\composer\{ autoload\classmap, part, part\anArray, part\name };
use norsys\score\serializer\keyValue as serializer;

class any
	implements
		classmap
{
	private
		$filenames
	;

	function __construct(filename... $filenames)
	{
		$this->filenames = $filenames;
	}

	function keyValueSerializerIs(serializer $serializer) :void
	{
		$serializer
			->arrayToSerializeWithNameIs(
				new name\autoload\classmap,
				new part\text\anArray\fifo(... $this->filenames)
			)
		;
	}
}
