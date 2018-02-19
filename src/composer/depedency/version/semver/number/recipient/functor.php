<?php namespace norsys\score\composer\depedency\version\semver\number\recipient;

use norsys\score\{ composer\depedency\version\semver, php\block };

class functor extends block\functor
	implements
		semver\number\recipient
{
	function semverVersionNumberIs(semver\number $number) :void
	{
		parent::blockArgumentsAre($number);
	}
}
