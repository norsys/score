<?php namespace norsys\score\php\string\provider;

use norsys\score\php;
use norsys\score\php\string\{
	provider,
	recipient
};

class block
	implements
		provider
{
	private
		$block
	;

	function __construct(php\block $block)
	{
		$this->block = $block;
	}

	function recipientOfStringIs(recipient $recipient) :void
	{
		$this->block->blockArgumentsAre($recipient);
	}
}
