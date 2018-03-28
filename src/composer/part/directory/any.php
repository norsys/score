<?php namespace norsys\score\composer\part\directory;

use norsys\score\composer\part\text;
use norsys\score\fs\path;
use norsys\score\php\string\{ recipient, provider };

class any
	implements
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
		(
			new provider\suffix\provider(
				new path\separator\unix,
				$this->path
			)
		)
			->recipientOfStringIs($recipient)
		;
	}
}
