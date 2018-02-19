<?php namespace norsys\score\composer\depedency\version\semver\converter;

use norsys\score\{ composer\depedency\version\semver, php };

interface toString
{
	function recipientOfSemverVersionAsStringIs(semver $semver, php\string\recipient $recipient) :void;
}
