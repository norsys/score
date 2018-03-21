<?php namespace norsys\score\composer\autoload\psr4\mapping\prefix;

use norsys\score\composer\autoload\psr4\mapping\prefix;
use norsys\score\php\string\{ recipient, recipient\buffer, recipient\suffix, provider };
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
		(
			new provider\suffix\provider(
				new namespacing\separator\official,
				... $this->labels
			)
		)
			->recipientOfStringIs($recipient)
		;
	}
}
