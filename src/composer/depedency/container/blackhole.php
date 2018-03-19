<?php namespace norsys\score\composer\depedency\container;

use norsys\score\container\iterator\block;
use norsys\score\composer\depedency\container;
use norsys\score\serializer\keyValue as serializer;

class blackhole
	implements
		container
{
	function keyValueSerializerIs(serializer $serializer) :void
	{
	}

	function blockForContainerIteratorIs(block $block) :void
	{
	}
}
