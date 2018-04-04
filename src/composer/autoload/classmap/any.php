<?php namespace norsys\score\composer\autoload\classmap;

use norsys\score\composer\{ autoload\classmap, fs\path, part, part\anArray, part\name };
use norsys\score\serializer\keyValue as serializer;

class any
	implements
		classmap
{
	private
		$paths
	;

	function __construct(path... $paths)
	{
		$this->paths = $paths;
	}

	function keyValueSerializerIs(serializer $serializer) :void
	{
		$serializer
			->arrayToSerializeWithNameIs(
				new name\autoload\classmap,
				new part\anArray\fifo(... $this->paths)
			)
		;
	}
}
