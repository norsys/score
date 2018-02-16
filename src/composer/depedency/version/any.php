<?php namespace norsys\score\composer\depedency\version;

use norsys\score\{ composer\depedency, php };

class any extends php\string\any
	implements
		depedency\version
{
	private const stability = '(?:(-|@)(?:dev|alpha|beta|RC|stable))?';
	private const operators = '(?:>|>=|<|<=|!=)?';
	private const version = '(?:\d+(?:\.(?:\d+|\*))*)' . self::stability;
	private const constraint = self::operators . self::version;
	private const unaryOperators = '(?:~|\^)?';

	function __construct(string $string)
	{
		if (! preg_match(
			'/' .
			'(?:^' . self::constraint . '(?: (?:\|\| )?' . self::constraint . ')*' . '$)' .
			'|' .
			'(?:^' . self::version . ' - ' . self::version . '$)' .
			'|' .
			'(?:' . self::unaryOperators . self::version . '$)' .
			'/',
			$string
			)
		)
		{
			throw new \invalidArgumentException('Argument must be a valid composer version');
		}

		parent::__construct($string);
	}
}
