<?php namespace norsys\score\composer\depedency\version\semver;

use norsys\score\composer\depedency\version\semver;

class major extends semver\major\minor
{
	function __construct(semver\number $number)
	{
		parent::__construct($number, new semver\number\blackhole);
	}
}
