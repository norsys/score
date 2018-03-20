<?php namespace norsys\score\php\label;

use norsys\score\php;
use norsys\score\php\test\{ variable\isTrue, recipient\exception\fallback as exception };

class any extends php\string\any
	implements
		php\label
{
	function __construct(string $string, \exception $exception = null)
	{
		(
			new isTrue\strictly(! preg_match('/^[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*$/', $string))
		)
			->recipientOfTestIs(
				new exception(new \invalidArgumentException('string must match `[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*`'), $exception)
			)
		;

		parent::__construct($string);
	}
}
