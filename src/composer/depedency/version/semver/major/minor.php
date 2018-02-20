<?php namespace norsys\score\composer\depedency\version\semver\major;

use norsys\score\composer\depedency\version\semver;

class minor extends semver\any
{
	function __construct(semver\number $number, semver\number $minor)
	{
		parent::__construct($number, $minor, new semver\number\blackhole);
	}
}
