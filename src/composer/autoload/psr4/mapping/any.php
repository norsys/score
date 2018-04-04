<?php namespace norsys\score\composer\autoload\psr4\mapping;

use norsys\score\composer\autoload\psr4\{ mapping, mapping\prefix };
use norsys\score\composer\fs\path;
use norsys\score\serializer\keyValue as serializer;

class any
	implements
		mapping
{
	private
		$prefix,
		$path
	;

	function __construct(prefix $prefix, path $path)
	{
		$this->prefix = $prefix;
		$this->path = $path;
	}

	function keyValueSerializerIs(serializer $serializer) :void
	{
		$serializer->partToSerializeWithNameIs($this->prefix, $this->path);
	}
}
