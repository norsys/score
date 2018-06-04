<?php namespace norsys\score\php\string\recipient;

use norsys\score\{ php, php\string\recipient };

class block
	implements
		recipient
{
	private
		$block
	;

	function __construct(php\block $block)
	{
		$this->block = $block;
	}

	function stringIs(string $string) :void
	{
		$this->block->blockArgumentsAre($string);
	}
}
