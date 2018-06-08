<?php namespace norsys\score\php\string\recipient\buffer\prefix;

use norsys\score\php\block;
use norsys\score\{ php, php\string\recipient\functor };
use norsys\score\php\test\{ variable\defined, recipient\ifTrue\functor as ifTrue };

class provider
	implements
		php\string\recipient,
		php\string\provider
{
	private
		$provider,
		$buffer
	;

	function __construct(php\string\provider $provider, string $buffer = null)
	{
		$this->provider = $provider;
		$this->buffer = $buffer;
	}

	function stringIs(string $string) :void
	{
		$this->provider
			->recipientOfStringIs(
				new functor(
					function($prefix) use ($string)
					{
						(
							new php\string\recipient\prefix(
								$prefix,
								new functor(
									function($prefixedString)
									{
										(
											new php\string\recipient\prefix(
												(string) $this->buffer,
												new functor(
													function($buffer)
													{
														$this->buffer = $buffer;
													}
												)
											)
										)
											->stringIs($prefixedString)
										;
									}
								)
							)
						)
							->stringIs($string)
						;
					}
				)
			)
		;
	}

	function recipientOfStringIs(php\string\recipient $recipient) :void
	{
		(
			new defined($this->buffer)
		)
			->recipientOfTestIs(
				new ifTrue(
					function() use ($recipient)
					{
						$recipient->stringIs($this->buffer);
					}
				)
			)
		;
	}
}
