<?php namespace norsys\score\composer\depedency\version\semver\number\converter\toString;

use norsys\score\{
	php\string\recipient,
	composer\depedency\version\semver\number,
	composer\depedency\version\semver\number\converter\toString
};

class identical
	implements
		toString
{
	function recipientOfSemverNumberAsStringIs(number $number, recipient $recipient) :void
	{
		$number->recipientOfStringIs($recipient);
	}
}
