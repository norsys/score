<?php namespace norsys\score\composer\autoload\psr4\mapping\prefix;

use norsys\score\composer\autoload\psr4\mapping\prefix;
use norsys\score\php\string\{ recipient, recipient\buffer, recipient\suffix, provider };
use norsys\score\php\{ identifier, aNamespace };
use norsys\score\container\iterator\{ fifo, block };

class official
	implements
		prefix
{
	private
		$identifiers
	;

	function __construct(identifier... $identifiers)
	{
		$this->identifiers = $identifiers;
	}

	function recipientOfStringIs(recipient $recipient) :void
	{
		(
			new provider\suffix\provider(
				new aNamespace\separator\official,
				... $this->identifiers
			)
		)
			->recipientOfStringIs($recipient)
		;
	}
}
