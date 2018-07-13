<?php namespace norsys\score\php\test\match;

use norsys\score\php;

class regex
	implements
		php\test\variable
{
	private
		$regex,
		$provider
	;

	function __construct(php\string\regex $regex, php\string\provider $provider)
	{
		$this->regex = $regex;
		$this->provider = $provider;
	}

	function recipientOfTestIs(php\test\recipient $recipient) :void
	{
		$this->provider
			->recipientOfStringIs(
				new php\string\recipient\functor(
					function($string) use ($recipient)
					{
						$this->regex
							->recipientOfRegexMatchingAgainstStringIs(
								$string,
								$recipient
							)
						;
					}
				)
			)
		;
	}
}
