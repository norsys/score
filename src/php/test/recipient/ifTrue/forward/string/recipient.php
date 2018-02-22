<?php namespace norsys\score\php\test\recipient\ifTrue\forward\string;

use norsys\score\{ php\test, php, php\block };

class recipient extends test\recipient\ifTrue
{
	function __construct(string $string, php\string\recipient $recipient)
	{
		parent::__construct(new block\forwarder\string\recipient($string, $recipient));
	}
}
