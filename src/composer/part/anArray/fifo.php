<?php namespace norsys\score\composer\part\anArray;

use norsys\score\composer\part;
use norsys\score\serializer\keyValue as serializer;
use norsys\score\container\iterator;

class fifo
	implements
		part
{
	private
		$parts
	;

	function __construct(part... $parts)
	{
		$this->parts = $parts;
	}

	function keyValueSerializerIs(serializer $serializer) :void
	{
		(
			new iterator\fifo
		)
			->variablesForIteratorBlockAre(
				new iterator\block\functor(
					function($iterator, $part) use ($serializer)
					{
						$part->keyValueSerializerIs($serializer);
					}
				),
				... $this->parts
			)
		;
	}
}
