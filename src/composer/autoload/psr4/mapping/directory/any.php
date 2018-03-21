<?php namespace norsys\score\composer\autoload\psr4\mapping\directory;

use norsys\score\composer\autoload\psr4\mapping\directory;
use norsys\score\fs\path\filename;
use norsys\score\php\string\{ recipient, provider };
use norsys\score\container\iterator\{ fifo, block };

class any
	implements
		directory
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
