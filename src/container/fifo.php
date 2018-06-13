<?php namespace norsys\score\container;

class fifo
{
	private
		$values
	;

	function __construct(... $values)
	{
		$this->values = $values;
	}

	function blockForIteratorIs(iterator\block $block) :void
	{
		(
			new iterator\fifo
		)
			->variablesForIteratorBlockAre(
				$block,
				... $this->values
			)
		;
	}
}
