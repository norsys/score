<?php namespace norsys\score\composer\depedency\version;

use norsys\score\composer\depedency\version;
use norsys\score\php\{ string\any as anyString, test\variable\isTrue, test\recipient\ifTrue\exception };

class any extends anyString
	implements
		version
{
	private const stability = '(?:(?:-|@)(?:dev|alpha|beta|RC|stable))?';
	private const operators = '(?:>|>=|<|<=|!=)?';
	private const version = '(?:\d+(?:\.(?:\d+|\*))*)' . self::stability;
	private const constraint = self::operators . self::version;
	private const unaryOperators = '(?:~|\^)?';

	function __construct(string $string)
	{
		(
			new isTrue\strictly(
				! preg_match(
					'/' .
					self::regex(self::constraint . '(?: (?:\|\| )?' . self::constraint . ')*') .
					'|' .
					self::regex(self::version . ' - ' . self::version) .
					'|' .
					self::regex(self::unaryOperators . self::version) .
					'/',
					$string
				)
			)
		)
			->recipientOfTestIs(
				new exception(new \invalidArgumentException('Argument must be a valid composer version'))
			)
		;

		parent::__construct($string);
	}

	private static function regex(string $string) :string
	{
		return '(?:^' . $string . '$)';
	}
}
