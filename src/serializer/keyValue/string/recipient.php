<?php namespace norsys\score\serializer\keyValue\string;

use norsys\score\php;
use norsys\score\serializer\keyValue as serializer;
use norsys\score\composer\part\text;

class recipient
	implements
		php\string\recipient
{
	private
		$serializer
	;

	function __construct(serializer $serializer)
	{
		$this->serializer = $serializer;
	}

	function stringIs(string $string) :void
	{
		$this->serializer
			->textToSerializeIs(
				new text\any($string)
			)
		;
	}
}
