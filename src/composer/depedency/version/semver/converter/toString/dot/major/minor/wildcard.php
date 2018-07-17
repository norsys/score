<?php namespace norsys\score\composer\depedency\version\semver\converter\toString\dot\major\minor;

use norsys\score\{ composer\depedency\version\semver\converter\toString, php, composer\depedency\version\semver };

class wildcard extends toString\dot\aggregator
{
	function __construct(semver\number\converter\toString $majorToStringConverter = null, semver\number\converter\toString $minorToStringConverter = null)
	{
		parent::__construct($majorToStringConverter, $minorToStringConverter, new semver\number\converter\toString\any('*'));
	}
}
