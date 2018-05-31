<?php namespace norsys\score\php\string\recipient;

use norsys\score\{ php\string\recipient };
use norsys\score;

class trampoline
	implements
		recipient
{
	private
		$trampoline
	;

	function __construct(score\trampoline $trampoline)
	{
		$this->trampoline = $trampoline;
	}

	function stringIs(string $string) :void
	{
		$this->trampoline->trampolineArgumentsAre($string);
	}
}
