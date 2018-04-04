<?php namespace norsys\score\composer\fs\path;

use norsys\score\composer\{ fs\path, part\text\any as text };
use norsys\score\fs\path\unix;
use norsys\score\serializer\keyValue as serializer;
use norsys\score\php\string\recipient;

class any extends unix\relative\filename
	implements
		path
{
	function __construct(filename... $filenames)
	{
		parent::__construct(... $filenames);
	}

	function keyValueSerializerIs(serializer $serializer) :void
	{
		$this
			->recipientOfStringIs(
				new recipient\functor(
					function($string) use ($serializer)
					{
						$serializer->textToSerializeIs(new text($string));
					}
				)
			)
		;
	}
}
