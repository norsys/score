<?php namespace norsys\score\php\aNamespace;

use norsys\score\php;

use norsys\score\php\{
	aNamespace,
	identifier,
	identifier\converter\toString as converter,
	string\recipient
};

use norsys\score\container\{
	fifo,
	iterator\block\functor as block
};

class any
	implements
		aNamespace
{
	private
		$identifiers
	;

	function __construct(identifier... $identifiers)
	{
		$this->identifiers = $identifiers;
	}

	function recipientOfStringIs(php\string\recipient $recipient) :void
	{
	}

	function recipientOfIdentifierFromToStringConverterIs(converter $converter, recipient $recipient) :void
	{
		(
			new fifo(
				... $this->identifiers
			)
		)
			->blockForIteratorIs(
				new block(
					function($iterator, $identifier) use ($converter, $recipient) {
						$converter->recipientOfPhpIdentifierAsStringIs($identifier, $recipient);
					}
				)
			)
		;
	}
}
