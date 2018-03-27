<?php namespace norsys\score\composer\autoload\classmap\filename;

use norsys\score\composer\autoload\classmap\filename;
use norsys\score\fs\path;
use norsys\score\php\string\recipient;
use norsys\score\container\iterator\{ fifo, block };
use norsys\score\php\string\{ join, any };

class file
	implements
		filename
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
				new any('/'),
				... $this->filenames
			)
		)
			->recipientOfStringIs($recipient)
		;
	}
}
