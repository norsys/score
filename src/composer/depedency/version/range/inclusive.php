<?php namespace norsys\score\composer\depedency\version\range;

use norsys\score\{ composer\depedency\version, php };

class inclusive
	implements
		version
{
	private
		$low,
		$high
	;

	function __construct(version $low, version $high)
	{
		$this->low = $low;
		$this->high = $high;
	}

	function recipientOfStringIs(php\string\recipient $recipient) :void
	{
		$this->low
			->recipientOfStringIs(
				new php\string\recipient\functor(
					function($low) use ($recipient)
					{
						$this->high
							->recipientOfStringIs(
								new php\string\recipient\functor(
									function($high) use ($low, $recipient)
									{
										$recipient->stringIs($low . ' - ' . $high);
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
