<?php namespace norsys\score\composer\autoload\psr4\mapping\prefix;

use norsys\score\composer\autoload\psr4\mapping\prefix;
use norsys\score\php\string\{ recipient, recipient\buffer, recipient\suffix };
use norsys\score\php\{ label, namespacing };
use norsys\score\container\iterator\{ fifo, block };

class official
	implements
		prefix
{
	private
		$labels
	;

	function __construct(label... $labels)
	{
		$this->labels = $labels;
	}

	function recipientOfStringIs(recipient $recipient) :void
	{
		$buffer = new buffer;

		(
			new fifo
		)
			->variablesForIteratorBlockAre(
				new block\functor(
					function($iterator, $label) use ($buffer)
					{
						$label
							->recipientOfStringIs(
								new suffix\provider(
									new namespacing\separator\official,
									$buffer
								)
							)
						;

					}
				),
				... $this->labels
			)
		;

		$buffer->recipientOfStringIs($recipient);
	}
}
