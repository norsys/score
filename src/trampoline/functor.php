<?php namespace norsys\score\trampoline;

use norsys\score\{ trampoline, php\block };

class functor extends block\functor
	implements
		trampoline
{
	function argumentsForBlockAre(block $block, ... $arguments) :void
	{
		parent::blockArgumentsAre($block, ... $arguments);
	}
}
