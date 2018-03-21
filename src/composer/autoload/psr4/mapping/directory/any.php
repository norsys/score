<?php namespace norsys\score\composer\autoload\psr4\mapping\directory;

use norsys\score\composer\autoload\psr4\mapping\directory;
use norsys\score\php\string\{ recipient, recipient\buffer, recipient\suffix };
use norsys\score\fs\path\filename;
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
		$buffer = new buffer;

		(
			new fifo
		)
			->variablesForIteratorBlockAre(
				new block\functor(
					function($iterator, $filename) use ($buffer)
					{
						$filename
							->recipientOfStringIs(
								new suffix(
									'/',
									$buffer
								)
							)
						;
					}
				),
				... $this->filenames
			)
		;

		$buffer->recipientOfStringIs($recipient);
	}
}
