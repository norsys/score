<?php namespace norsys\score\composer\fs\path\filename;

use norsys\score\composer\fs\path\filename;
use norsys\score\php;
use norsys\score\php\{ test\variable\disjunction, test\variable\isTrue, test\recipient\exception\fallback as exception };

class any extends php\string\any
	implements
		filename
{
	function __construct(string $string, \exception $exception = null)
	{
		(
			new disjunction(
				new isTrue\strictly(strlen($string) > 255),
				new isTrue\string\contains($string, chr(0), '/', '\\', ':', '*', '?', '<', '>', '|')
			)
		)
			->recipientOfTestIs(
				new exception(new \invalidArgumentException('Argument must be string less than 256 bytes which not contains `\0`, `/`, `\`, `:`, `*`, `?`, `<`, `>` or `|`'), $exception)
			)
		;

		parent::__construct($string);
	}
}
