<?php namespace norsys\score\composer\autoload\classmap\filename;

use norsys\score\composer\{ autoload\classmap\filename, part };
use norsys\score\serializer\keyValue as serializer;

class directory extends part\directory\any
	implements
		filename
{
	function keyValueSerializerIs(serializer $serializer) :void
	{
		$serializer->textToSerializeIs($this);
	}
}
