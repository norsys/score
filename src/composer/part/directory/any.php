<?php namespace norsys\score\composer\part\directory;

use norsys\score\composer\part\text;
use norsys\score\fs\path\filename;
use norsys\score\php\string\{ recipient, provider };

class any
	implements
		text
{
	private
		$filenames
	;

	function __construct(filename... $filenames)
	{
		$this->filenames = $filenames;
	}

	function recipientOfStringIs(recipient $recipient) :void
	{
		(
			new provider\suffix(
				'/',
				... $this->filenames
			)
		)
			->recipientOfStringIs($recipient)
		;
	}
}
