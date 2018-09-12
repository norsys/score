<?php namespace norsys\score\net\port;

use norsys\score\{
	net\port,
	php\integer\unsigned,
	php\integer\test\isGreaterThan,
	php\test\recipient\ifTrue\exception
};

class any extends unsigned\any
	implements
		port
{
	function __construct(int $value, \exception $exception = null)
	{
		parent::__construct($value, $exception ?: $exception = new \invalidArgumentException('Port must have a value greater than or equal to 0 and less than or equal to 65535'));

		(
			new isGreaterThan($value, 65535)
		)
			->recipientOfTestIs(
				new exception($exception)
			)
		;
	}
}
