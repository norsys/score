<?php namespace norsys\score\php\string\regex;

use norsys\score\php\{
	string\regex,
	test,
	test\recipient\ifTrue
};

class pcre
	implements
		regex
{
	private
		$regex
	;

	function __construct(string $regex)
	{
		$previousErrorHandler = set_error_handler(function() {});

		(
			new test\isFalse\strictly
		)
			->recipientOfTestOnVariableIs(
				preg_match($regex, ''),
				new ifTrue\exception(new\invalidArgumentException('Syntax error in regular expression'))
			)
		;

		set_error_handler($previousErrorHandler);

		$this->regex = $regex;
	}

	function recipientOfRegexMatchingAgainstStringIs(string $string, test\recipient $recipient) :void
	{
		$recipient->booleanIs(preg_match($this->regex, $string) !== 0);
	}
}
