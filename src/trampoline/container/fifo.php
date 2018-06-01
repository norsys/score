<?php namespace norsys\score\trampoline\container;

use norsys\score\trampoline;
use norsys\score\container\{
	iterator,
	iterator\block\functor
};

class fifo
	implements
		trampoline
{
	private
		$trampolines
	;

	function __construct(trampoline... $trampolines)
	{
		$this->trampolines = $trampolines;
	}

	function trampolineArgumentsAre(... $arguments)
	{
		(
			new iterator\fifo
		)
			->variablesForIteratorBlockAre(
				new functor(
					function($iterator, $trampoline) use (& $arguments)
					{
						$iterator->nextIterationAreUseless();

						$trampoline
							->trampolineArgumentsAre(
								new trampoline\functor(
									function(... $argumentsFromTrampoline) use ($iterator, & $arguments) {
										$arguments = array_merge($arguments, $argumentsFromTrampoline);

										$iterator->nextIterationAreUsefull();
									}
								),
								... $arguments
							)
						;
					}
				),
				... $this->trampolines
			)
		;
	}
}
