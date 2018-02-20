<?php namespace norsys\score\composer\depedency\version\semver\major;

use norsys\score\composer\depedency\version\semver;

class wildcard extends semver\any
{
	function __construct(semver\number $major = null, semver\converter\toString $toStringConverter = null)
	{
		parent::__construct($major, new semver\number\blackhole, new semver\number\blackhole, $toStringConverter ?: new semver\converter\toString\dot\major\wildcard);
	}
}
