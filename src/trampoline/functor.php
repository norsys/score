<?php namespace norsys\score\trampoline;

use norsys\score\{ trampoline, php };

class functor extends php\block\functor
	implements
		trampoline
{
	function trampolineArgumentsAre(... $arguments) :void
	{
		parent::blockArgumentsAre(... $arguments);
	}
}
