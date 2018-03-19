<?php namespace norsys\score\composer\part\container;

use norsys\score\composer\{ part\container, part };
use norsys\score\container\{ iterator\block, iterator, iterator\block\functor as iteratorBlock };
use norsys\score\serializer\keyValue as serializer;

class any
	implements
		container
{
	private
		$iterator,
		$parts
	;

	function __construct(iterator $iterator, part... $parts)
	{
		$this->iterator = $iterator;
		$this->parts = $parts;
	}

	function keyValueSerializerIs(serializer $serializer) :void
	{
		$this
			->blockForContainerIteratorIs(
				new iteratorBlock(
					function($iterator, $part) use ($serializer)
					{
						$part
							->keyValueSerializerIs(
								$serializer
							)
						;
					}
				)
			)
		;
	}

	function blockForContainerIteratorIs(block $block) :void
	{
		$this->iterator
			->variablesForIteratorBlockAre(
				$block,
				... $this->parts
			)
		;
	}
}
