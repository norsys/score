<?php namespace norsys\score\composer\fs\path;

use norsys\score\fs\path;
use norsys\score\php;
use norsys\score\php\{ test\variable\disjunction, test\variable\isTrue, test\recipient\exception\fallback as exception };

class filename extends php\string\any
	implements
		path\filename
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
