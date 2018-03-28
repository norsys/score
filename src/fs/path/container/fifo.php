<?php namespace norsys\score\fs\path\container;

use norsys\score\fs\{ path\container, path };
use norsys\score\container\{ iterator\block, iterator };

class fifo
	implements
		container
{
	private
		$paths
	;

	function __construct(path... $paths)
	{
		$this->paths = $paths;
	}

	function blockForContainerIteratorIs(block $block) :void
	{
		(
			new iterator\fifo
		)
			->variablesForIteratorBlockAre(
				$block,
				... $this->paths
			)
		;
	}
}
