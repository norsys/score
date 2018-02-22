<?php namespace norsys\score\php\test\recipient;

use norsys\score\php\{ test\recipient, block };

class ifTrue
	implements
		recipient
{
	private
		$block
	;

	function __construct(block $block)
	{
		$this->block = $block;
	}

	function booleanIs(bool $bool) :void
	{
		if ($bool)
		{
			$this->block->blockArgumentsAre();
		}
	}
}
