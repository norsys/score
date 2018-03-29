<?php namespace norsys\score\composer\autoload\classmap\path;

use norsys\score\composer\{ autoload\classmap, part };
use norsys\score\serializer\keyValue as serializer;

class directory extends part\directory\any
	implements
		classmap\path
{
	function keyValueSerializerIs(serializer $serializer) :void
	{
		$serializer->textToSerializeIs($this);
	}
}
