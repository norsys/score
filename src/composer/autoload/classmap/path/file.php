<?php namespace norsys\score\composer\autoload\classmap\path;

use norsys\score\composer\autoload\classmap;
use norsys\score\fs\path;
use norsys\score\php\string\recipient;
use norsys\score\php\string\{ join, any };
use norsys\score\composer\part\text;
use norsys\score\serializer\keyValue as serializer;

class file
	implements
		classmap\path,
		text
{
	private
		$path
	;

	function __construct(path $path)
	{
		$this->path = $path;
	}

	function recipientOfStringIs(recipient $recipient) :void
	{
		$this->path->recipientOfStringIs($recipient);
	}

	function keyValueSerializerIs(serializer $serializer) :void
	{
		$serializer->textToSerializeIs($this);
	}
}
