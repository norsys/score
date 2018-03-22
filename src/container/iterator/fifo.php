<?php namespace norsys\score\container\iterator;

use norsys\score\container;

class fifo
	implements
		container\iterator
{
	private
		$variables
	;

	function __construct()
	{
		$this->variables = new \arrayIterator;
	}

	function variablesForIteratorBlockAre(container\iterator\block $block, ... $variables) :void
	{
		$iterator = clone $this;
		$iterator->variables = new \arrayIterator($variables);

		foreach ($iterator->variables as $value)
		{
			$block->containerIteratorHasValue($iterator, $value);
		}
	}

	function nextIterationAreUseless() :void
	{
		try
		{
			$this->variables->seek(sizeof($this->variables) - 1);
		}
		catch (\exception $exception) {}
	}
}
