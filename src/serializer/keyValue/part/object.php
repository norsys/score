<?php namespace norsys\score\serializer\keyValue\part;

use norsys\score\serializer\{ keyValue\part, keyValue as serializer, keyValue\recipient\functor as serializerRecipient };
use norsys\score\php\string\{ recipient, recipient\buffer, recipient\functor };
use norsys\score\container\iterator\{ fifo, block\functor as iteratorBlock };

class object
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
			new fifo
		)
			->variablesForIteratorBlockAre(
				new iteratorBlock(
					function($iterator, $part) use ($serializer)
					{
						$part
							->keyValueSerializerIs(
								$serializer
							)
						;
					}
				),
				... $this->parts
			)
		;
	}
}
