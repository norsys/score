<?php namespace norsys\score\serializer\keyValue;

use norsys\score\{ serializer\keyValue as serializer, php\string\recipient  };

interface part
{
	function keyValueSerializerIs(serializer $serializer) :void;
}
