<?php namespace norsys\score\composer\name;

use norsys\score\composer\{ name, part };
use norsys\score\composer\depedency;
use norsys\score\serializer\keyValue as serializer;
use norsys\score\php\string\recipient\functor;

class any
	implements
		name
{
	private
		$name
	;

	function __construct(depedency\name $name)
	{
		$this->name = $name;
	}

	function keyValueSerializerIs(serializer $serializer) :void
	{
		$this->name
			->recipientOfStringIs(
				new functor(
					function($name) use ($serializer)
					{
						$serializer
							->textToSerializeWithNameIs(
								new part\name\name,
								new part\text\any($name)
							)
						;
					}
				)
			)
		;
	}
}
