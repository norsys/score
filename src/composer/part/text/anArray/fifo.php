<?php namespace norsys\score\composer\part\text\anArray;

use norsys\score\composer\{ part\text, part\text\anArray };
use norsys\score\serializer\keyValue as serializer;
use norsys\score\container\{ iterator\block, iterator };

class fifo
	implements
		anArray
{
	private
		$texts
	;

	function __construct(text... $texts)
	{
		$this->texts = $texts;
	}

	function keyValueSerializerIs(serializer $serializer) :void
	{
		(
			new iterator\fifo
		)
			->variablesForIteratorBlockAre(
				new block\functor(
					function($iterator, $text) use ($serializer)
					{
						$serializer
							->textToSerializeIs($text)
						;
					}
				),
				... $this->texts
			)
		;
	}
}
