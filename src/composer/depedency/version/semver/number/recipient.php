<?php namespace norsys\score\composer\depedency\version\semver\number;

use norsys\score\composer\depedency\version\semver;

interface recipient
{
	function semverVersionNumberIs(semver\number $number) :void;
}
