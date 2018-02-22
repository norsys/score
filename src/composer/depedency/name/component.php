<?php namespace norsys\score\composer\depedency\name;

use norsys\score\php\{ string\not\blank as stringNotBlank, test\variable\isTrue, test\recipient\ifTrue\exception };
use norsys\score\composer\depedency\name\{ vendor, project };

class component extends stringNotBlank
	implements
		vendor,
		project
{
	function __construct(string $string, \exception $exception)
	{
		(
			new isTrue\strictly(
				strpos($string, '\'') !== false || strpos($string, '"') !== false
			)
		)
			->recipientOfTestIs(
				new exception($exception)
			)
		;

		parent::__construct(
			$string,
			$exception
		);
	}

}
