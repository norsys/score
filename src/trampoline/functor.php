<?php namespace norsys\score\trampoline;

use norsys\score\{ trampoline, php\block };

class functor extends block\functor
	implements
		trampoline
{
	function trampolineArgumentsAre(... $arguments) :void
	{
		parent::blockArgumentsAre(... $arguments);
	}
}
