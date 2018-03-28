<?php namespace norsys\score\fs\path;

use norsys\score\fs\path;
use norsys\score\php\string\{ recipient, recipient\buffer, recipient\functor, recipient\prefix };
use norsys\score\container\iterator\block;

class unix
	implements
		path
{
	private
		$container
	;

	function __construct(filename\container $container)
	{
		$this->container = $container;
	}

	function recipientOfStringIs(recipient $recipient) :void
	{
		$buffer = new buffer;

		$this->container
			->blockForContainerIteratorIs(
				new block\functor(
					function($iterator, $filename) use ($buffer)
					{
						$filename
							->recipientOfStringIs(
								new prefix\provider(
									new path\separator\unix,
									$buffer
								)
							)
						;
					}
				)
			)
		;

		$buffer->recipientOfStringIs($recipient);
	}

	function recipientOfFilenameContainerFromFsPathIs(filename\container\recipient $recipient) :void
	{
		$recipient->fsPathFilenameContainerIs($this->container);
	}
}
