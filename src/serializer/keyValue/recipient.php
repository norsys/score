<?php namespace norsys\score\serializer\keyValue;

use norsys\score\serializer\keyValue as serializer;

interface recipient
{
	function keyValueSerializerIs(serializer $serializer) :void;
}
