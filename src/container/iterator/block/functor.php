<?php namespace norsys\score\container\iterator\block;

use norsys\score\{ container, php };

class functor extends php\block\functor
	implements
		container\iterator\block
{
	function containerIteratorHasValue(container\iterator $iterator, $value) :void
	{
		parent::blockArgumentsAre($iterator, $value);
	}
}
