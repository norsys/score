<?php namespace norsys\score\php\aNamespace\container;

use norsys\score\{
	php\identifier,
	container,
	container\iterator\block\functor as block
};

class fifo
{
	private
		$identifiers
	;

	function __construct(identifier... $identifiers)
	{
		$this->identifiers = $identifiers;
	}

	function recipientOfPhpIdentifierIs(identifier\recipient $recipient) :void
	{
		(
			new container\fifo(
				... $this->identifiers
			)
		)
			->blockForIteratorIs(
				new block(
					function($iterator, $identifier) use ($recipient) {
						$recipient->phpIdentifierIs($identifier);
					}
				)
			)
		;
	}
}
