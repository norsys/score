<?php namespace norsys\score\composer\depedency\version\semver\number\converter\toString;

use norsys\score\{ composer\depedency\version\semver\number, php };

class any
	implements
		number\converter\toString
{
	private
		$string
	;

	function __construct(string $string)
	{
		$this->string = $string;
	}

	function recipientOfSemverNumberAsStringIs(number $number, php\string\recipient $recipient) :void
	{
		$recipient->stringIs($this->string);
	}
}
