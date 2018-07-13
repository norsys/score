<?php namespace norsys\score\composer\depedency\version;

use norsys\score\composer\depedency\version;
use norsys\score\php\{
	string\regex\pcre,
	string\any as anyString,
	test\match\regex,
	test\recipient\ifFalse\exception
};

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
		parent::__construct($string);

		(
			new regex(
				new pcre(
					'/' .
					self::regex(self::constraint . '(?: (?:\|\| )?' . self::constraint . ')*') .
					'|' .
					self::regex(self::version . ' - ' . self::version) .
					'|' .
					self::regex(self::unaryOperators . self::version) .
					'/'
				),
				$this
			)
		)
			->recipientOfTestIs(
				new exception(new \invalidArgumentException('Argument must be a valid composer version'))
			)
		;
	}

	private static function regex(string $string) :string
	{
		return '(?:^' . $string . '$)';
	}
}
