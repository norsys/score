<?php namespace norsys\score\composer\autoload\psr4\mapping;

use norsys\score\composer\autoload\psr4\{ mapping, mapping\prefix, mapping\directory };
use norsys\score\serializer\keyValue as serializer;

class any
	implements
		mapping
{
	private
		$prefix,
		$directory
	;

	function __construct(prefix $prefix, directory $directory)
	{
		$this->prefix = $prefix;
		$this->directory = $directory;
	}

	function keyValueSerializerIs(serializer $serializer) :void
	{
		$serializer->textToSerializeWithNameIs($this->prefix, $this->directory);
	}
}
