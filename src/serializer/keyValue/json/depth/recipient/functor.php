<?php namespace norsys\score\serializer\keyValue\json\depth\recipient;

use norsys\score\serializer\keyValue\json\{ depth\recipient, depth };
use norsys\score\php\block;

class functor extends block\functor
	implements
		recipient
{
	function jsonDepthIs(depth $depth) :void
	{
		parent::blockArgumentsAre($depth);
	}
}
