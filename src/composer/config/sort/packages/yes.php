<?php namespace norsys\score\composer\config\sort\packages;

use norsys\score\composer\{ config\option, part\object, part\name, part\text };
use norsys\score\serializer\keyValue as serializer;

class yes
	implements
		option
{
	function keyValueSerializerIs(serializer $serializer) :void
	{
		$serializer->textToSerializeWithNameIs(new name\config\sort\packages, new text\yes);
	}
}
