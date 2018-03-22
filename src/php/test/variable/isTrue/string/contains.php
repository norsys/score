<?php namespace norsys\score\php\test\variable\isTrue\string;

use norsys\score\php\test\{ variable, recipient, variable\isTrue\strictly as isTrue, recipient\ifTrue\functor as ifTrue };
use norsys\score\container\iterator\{ fifo, block\functor as block };

class contains
	implements
		variable
{
	private
		$boolean
	;

	function __construct(string $haystack, string... $needles)
	{
		(new fifo)
			->variablesForIteratorBlockAre(
				new block(
					function($iterator, $needle) use ($haystack)
					{
						(
							new isTrue($this->boolean = strpos($haystack, $needle) !== false)
						)
							->recipientOfTestIs(
								new ifTrue(
									function() use ($iterator)
									{
										$iterator->nextIterationAreUseless();
									}
								)
							)
						;
					}
				),
				... $needles
			)
		;
	}

	function recipientOfTestIs(recipient $recipient) :void
	{
		$recipient->booleanIs($this->boolean);
	}
}
