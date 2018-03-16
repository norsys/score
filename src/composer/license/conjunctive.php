<?php namespace norsys\score\composer\license;

use norsys\score\composer\{ license, license\name, part\name\license as serializerName, part\text\any as text  };
use norsys\score\serializer\keyValue as serializer;
use norsys\score\php\test\{ defined, recipient\ifTrue\functor as ifTrue };
use norsys\score\php\string\{ recipient, recipient\functor, join, any, recipient\surround\parenthesis };
use norsys\score\container\iterator\{ fifo, block\functor as iteratorBlock };

class conjunctive
	implements
		license
{
	private
		$names
	;

	function __construct(name... $names)
	{
		$this->names = $names;
	}

	function keyValueSerializerIs(serializer $serializer) :void
	{
		(
			new join(
				new any(' and '),
				... $this->names
			)
		)
			->recipientOfStringIs(
				new parenthesis(
					new functor(
						function($license) use ($serializer)
						{
							$serializer->textToSerializeWithNameIs(new serializerName, new text($license));
						}
					)
				)
			)
		;
	}
}
