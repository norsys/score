<?php namespace norsys\score\php\string;

use norsys\score\php\string\{ provider, recipient, recipient\functor, operator };
use norsys\score\php\test\{ defined, recipient\ifTrue\functor as ifTrue };
use norsys\score\container\iterator\{ block\functor as iteratorBlock };
use norsys\score\container\fifo;

class join
	implements
		provider
{
	private
		$glue,
		$providers
	;

	function __construct(provider $glue, provider... $providers)
	{
		$this->glue = $glue;
		$this->providers = $providers;
	}

	function recipientOfStringIs(recipient $recipient) :void
	{
		$this->glue
			->recipientOfStringIs(
				new functor(
					function($glue) use ($recipient)
					{
						$buffer = new recipient\buffer\join($glue);

						(
							new fifo(
								... $this->providers
							)
						)
							->blockForIteratorIs(
								new iteratorBlock(
									function($iterator, $provider) use ($buffer)
									{
										$provider
											->recipientOfStringIs(
												$buffer
											)
										;
									}
								)
							)
						;

						$buffer->recipientOfStringIs($recipient);
					}
				)
			)
		;
	}
}
