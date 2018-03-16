<?php namespace norsys\score\composer\license;

use norsys\score\composer\{ license, license\name, part\name\license as serializerName, part\text\any as text  };
use norsys\score\serializer\keyValue as serializer;
use norsys\score\php\test\{ defined, recipient\ifTrue\functor as ifTrue };
use norsys\score\php\string\{ recipient, recipient\functor, join, any, recipient\surround\parenthesis };
use norsys\score\container\iterator\{ fifo, block\functor as iteratorBlock };

class withOperator
	implements
		license
{
	private
		$operator,
		$names
	;

	function __construct(operator $operator, name... $names)
	{
		$this->operator = $operator;
		$this->names = $names;
	}

	function keyValueSerializerIs(serializer $serializer) :void
	{
		(
			new join(
				$this->operator,
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
