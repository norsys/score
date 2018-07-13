<?php namespace norsys\score\php\identifier;

use norsys\score\php;
use norsys\score\php\{
	string\regex\pcre,
	test\match\regex,
	test\recipient\ifFalse\exception\fallback as exception
};

class any extends php\string\any
	implements
		php\identifier
{
	function __construct(string $string, \exception $exception = null)
	{
		parent::__construct($string);

		(
			new regex(
				new pcre('/^[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*$/'),
				$this
			)
		)
			->recipientOfTestIs(
				new exception(new \invalidArgumentException('string must match `[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*`'), $exception)
			)
		;
	}
}
