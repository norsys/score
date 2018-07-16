<?php namespace norsys\score\net\uri\authority\host;

use norsys\score\{
	net\uri\authority\host,
	php,
	php\string\regex\pcre,
	php\test\match\regex,
	php\test\recipient\ifFalse\exception\fallback as exception
};

class any extends php\string\any
	implements
		host
{
	function __construct(string $value, \exception $exception = null)
	{
		parent::__construct($value);

		(
			new regex(
				new pcre('/^(?:[-a-z0-9._~!$&\'()*+,;=]|%[0-9a-f]{2})*$/'),
				$this
			)
		)
			->recipientOfTestIs(
				new exception(new \invalidArgumentException('Host must containes only *(ALPHA / DIGIT / "-" / "." / "_" / "~" /" %" HEXDIG HEXDIG / "!" / "$" / "&" / "\'" / "(" / ")" / "*" / "+" / "," / ";" / "=")'), $exception)
			)
		;
	}
}
