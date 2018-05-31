<?php namespace norsys\score\trampoline\container;

use norsys\score\trampoline;

class fifo
	implements
		trampoline
{
	private
		$trampolines,
		$arguments,
		$break
	;

	function __construct(trampoline... $trampolines)
	{
		$this->trampolines = $trampolines;
	}

	function trampolineArgumentsAre(... $arguments)
	{
		$clone = clone $this;
		$clone->break = true;

		array_unshift(
			$arguments,
			new trampoline\functor(
				function(... $arguments) use ($clone) {
					$clone->arguments = array_merge($clone->arguments, $arguments);
					$clone->break = false;
				}
			)
		);

		$clone->arguments = $arguments;

		foreach ($clone->trampolines as $trampoline)
		{
			$trampoline
				->trampolineArgumentsAre(... $clone->arguments)
			;

			if ($clone->break)
			{
				break;
			}
		}
	}
}
