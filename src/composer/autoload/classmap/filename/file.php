<?php namespace norsys\score\composer\autoload\classmap\filename;

use norsys\score\composer\autoload\classmap\filename;
use norsys\score\fs\path;
use norsys\score\php\string\recipient;
use norsys\score\php\string\{ join, any };
use norsys\score\composer\part;
use norsys\score\serializer\keyValue as serializer;

class file
	implements
		filename,
		part
{
	private
		$filenames
	;

	function __construct(path\filename... $filenames)
	{
		$this->filenames = $filenames;
	}

	function recipientOfStringIs(recipient $recipient) :void
	{
		(
			new join(
				new path\separator\php,
				... $this->filenames
			)
		)
			->recipientOfStringIs($recipient)
		;
	}

	function keyValueSerializerIs(serializer $serializer) :void
	{
		$serializer->textToSerializeIs($this);
	}
}
