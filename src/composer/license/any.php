<?php namespace norsys\score\composer\license;

use norsys\score\composer\{ license, part\text\any as text, part\name };
use norsys\score\serializer\keyValue as serializer;

class any
	implements
		license
{
	private
		$license
	;

	function __construct(string $license)
	{
		$this->license = $license;
	}

	function keyValueSerializerIs(serializer $serializer) :void
	{
		$serializer
			->textToSerializeWithNameIs(
				new name\license,
				new text($this->license)
			)
		;
	}
}
