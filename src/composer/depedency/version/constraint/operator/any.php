<?php namespace norsys\score\composer\depedency\version\constraint\operator;

use norsys\score\{ composer\depedency\version\constraint\operator, php };

class any extends php\string\not\blank
	implements
		operator
{
	function __construct(string $string)
	{
		try
		{
			parent::__construct($string);
		}
		catch (\invalidArgumentException $exception)
		{
			throw new \invalidArgumentException('Operator of composer version constraint must be a not empty string');
		}
	}
}
