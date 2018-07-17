<?php namespace norsys\score\composer\depedency\version\semver\number\converter\toString;

use norsys\score\{ composer\depedency\version\semver\number, php };

class blackhole
	implements
		number\converter\toString
{
	function recipientOfSemverNumberAsStringIs(number $number, php\string\recipient $recipient) :void
	{
	}
}
