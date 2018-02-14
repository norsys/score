<?php namespace norsys\score\container\iterator;

use norsys\score\container;

class fifo
	implements
		container\iterator
{
	function variablesForIteratorBlockAre(container\iterator\block $block, ... $variables) :void
	{
		foreach ($variables as $value)
		{
			$block->containerIteratorHasValue($this, $value);
		}
	}
}
