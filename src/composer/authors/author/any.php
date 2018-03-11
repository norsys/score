<?php namespace norsys\score\composer\authors\author;

use norsys\score\composer\authors\author;
use norsys\score\serializer\keyValue as serializer;

class any
	implements
		author
{
	function keyValueSerializerIs(serializer $serializer) :void
	{
	}
}
