<?php namespace norsys\score\composer\depedency\version\semver\number\converter;

use norsys\score\{
	php\string\recipient,
	composer\depedency\version\semver\number
};

interface toString
{
	function recipientOfSemverNumberAsStringIs(number $number, recipient $recipient) :void;
}
