<?php namespace norsys\score\composer\autoload\classmap\path;

use norsys\score\composer\autoload\classmap;
use norsys\score\composer;
use norsys\score\fs\path;
use norsys\score\php;
use norsys\score\serializer\keyValue as serializer;

class fs
	implements
		classmap\path
{
	private
		$path
	;

	function __construct(path $path)
	{
		$this->path = $path;
	}

	function keyValueSerializerIs(serializer $serializer) :void
	{
		$this->path
			->recipientOfStringIs(
				new php\string\recipient\functor(
					function($pathAsString) use ($serializer)
					{
						$serializer->textToSerializeIs(new composer\part\text\any($pathAsString));
					}
				)
			)
		;
	}
}
