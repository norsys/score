<?php namespace norsys\score\trampoline\container;

use norsys\score\trampoline;
use norsys\score\php\block;
use norsys\score\container\{
	iterator,
	iterator\block\functor
};

class fifo
	implements
		trampoline
{
	private
		$trampolines,
		$arguments,
		$handler
	;

	function __construct(trampoline... $trampolines)
	{
		$this->trampolines = $trampolines;
	}

	function argumentsForBlockAre(block $block, ... $arguments) :void
	{
		$nothing = function() {};
		$callBlock = function() use ($block, & $arguments) {
			$block->blockArgumentsAre(... $arguments);
		};
		$do = $callBlock;

		(
			new iterator\fifo
		)
			->variablesForIteratorBlockAre(
				new functor(
					function($iterator, $trampoline) use ($nothing, $callBlock, & $do, & $arguments)
					{
						$iterator->nextIterationAreUseless();

						$do = $nothing;

						$trampoline
							->argumentsForBlockAre(
								new block\functor(
									function(... $argumentsFromTrampoline) use ($iterator, $callBlock, &$do, & $arguments) {
										$arguments = array_merge($arguments, $argumentsFromTrampoline);

										$do = $callBlock;

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

		$do();
	}
}
