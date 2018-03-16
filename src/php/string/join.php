<?php namespace norsys\score\php\string;

use norsys\score\php\string\{ provider, recipient, recipient\functor };
use norsys\score\php\test\{ defined, recipient\ifTrue\functor as ifTrue };
use norsys\score\container\iterator\{ fifo, block\functor as iteratorBlock };

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
						(new fifo)
							->variablesForIteratorBlockAre(
								new iteratorBlock(
									function($iterator, $provider) use (& $strings)
									{
										$provider
											->recipientOfStringIs(
												new functor(
													function($string) use (& $strings)
													{
														$strings[] = $string;
													}
												)
											)
										;
									}
								),
								... $this->providers
							)
						;

						(new defined)
							->recipientOfTestOnVariableIs(
								$strings,
								new ifTrue(
									function() use ($recipient, $glue, $strings)
									{
										$recipient->stringIs(join($glue, $strings));
									}
								)
							)
						;
					}
				)
			)
		;
	}
}
