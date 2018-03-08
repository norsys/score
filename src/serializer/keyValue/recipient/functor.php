<?php namespace norsys\score\serializer\keyValue\recipient;

use norsys\score\serializer\{ keyValue\recipient, keyValue as serializer };
use norsys\score\php\block;

class functor extends block\functor
	implements
		recipient
{
	function keyValueSerializerIs(serializer $serializer) :void
	{
		parent::blockArgumentsAre($serializer);
	}
}
