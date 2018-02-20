<?php namespace norsys\score\composer\depedency\version\semver\converter\toString\dot\major\minor;

use norsys\score\{ composer\depedency\version\semver\converter\toString, php, composer\depedency\version\semver };

class wildcard extends toString\dot\aggregator
{
	function __construct(php\integer\converter\toString $majorToStringConverter = null, php\integer\converter\toString $minorToStringConverter = null)
	{
		parent::__construct($majorToStringConverter, $minorToStringConverter, new php\integer\converter\toString\any('*'));
	}
}
