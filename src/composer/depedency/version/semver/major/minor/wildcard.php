<?php namespace norsys\score\composer\depedency\version\semver\major\minor;

use norsys\score\composer\depedency\version\semver;

class wildcard extends semver\any
{
	function __construct(semver\number $major = null, semver\number $minor = null, semver\converter\toString $toStringConverter = null)
	{
		parent::__construct(
			$major,
			$minor,
			new semver\number\blackhole,
			$toStringConverter ?: new semver\converter\toString\dot\major\minor\wildcard
		);
	}
}
