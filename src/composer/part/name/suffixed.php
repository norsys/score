<?php namespace norsys\score\composer\part\name;

use norsys\score\{ composer\part\name, php\string\recipient };
use norsys\score\php\string\{ aggregator\all as aggregator, recipient\suffix };
use norsys\score\php\block;

class suffixed
	implements
		name
{
	private
		$name,
		$suffix
	;

	function __construct(name $name, name $suffix)
	{
		$this->name = $name;
		$this->suffix = $suffix;
	}

	function recipientOfStringIs(recipient $recipient) :void
	{
		(
			new aggregator(
				$this->name,
				$this->suffix
			)
		)
			->blockIs(
				new block\functor(
					function ($name, $suffix) use ($recipient) {
						(
							new suffix(
								$suffix,
								$recipient
							)
						)
							->stringIs($name)
						;
					}
				)
			)
		;
	}
}
