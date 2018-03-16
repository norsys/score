<?php namespace norsys\score\composer\license\operator;

use norsys\score\composer\license\operator;
use norsys\score\{ php, php\string\recipient, php\string\recipient\surround\same, php\string\recipient\functor };

class any extends php\string\any
	implements
		operator
{
	function __construct(string $operator)
	{
		(
			new same(
				' ',
				new functor(
					function($operator)
					{
						parent::__construct($operator);
					}
				)
			)
		)
			->stringIs($operator)
		;
	}
}
