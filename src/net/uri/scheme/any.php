<?php namespace norsys\score\net\uri\scheme;

use norsys\score\{
	php,
	net\uri\scheme
};

class any extends php\string\lowercase
	implements
		scheme
{
	function __construct($string, \exception $exception = null)
	{
		parent::__construct($string);

		(
			new php\test\match\regex(
				new php\string\regex\pcre('/^[a-z][a-z0-9+-.]*$/'),
				$this
			)
		)
			->recipientOfTestIs(
				new php\test\recipient\ifFalse\exception\fallback(
					new \invalidArgumentException('Scheme must follow ALPHA *( ALPHA / DIGIT / "+" / "-" / "." )'),
					$exception
				)
			)
		;
	}
}
