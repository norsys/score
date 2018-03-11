<?php namespace norsys\score\composer;

use norsys\score\composer\part;
use norsys\score\serializer\keyValue as serializer;

class text
	implements
		part
{
	private
		$name,
		$text
	;

	function __construct(part\name $name, part\text $text)
	{
		$this->name = $name;
		$this->text = $text;
	}

	function keyValueSerializerIs(serializer $serializer) :void
	{
		$serializer
			->textToSerializeWithNameIs(
				$this->name,
				$this->text
			)
		;
	}
}
