<?php namespace norsys\score\composer\config;

use norsys\score\{ composer, serializer\keyValue as serializer };

class any
	implements
		composer\config
{
	function keyValueSerializerIs(serializer $serializer) :void
	{
	}
}
