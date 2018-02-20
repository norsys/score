<?php namespace norsys\score\composer\depedency\version\semver\converter\toString\dot\major;

use norsys\score\{ composer\depedency\version\semver\converter\toString, php, composer\depedency\version\semver };

class wildcard extends toString\dot\aggregator
{
	function __construct(php\integer\converter\toString $majorToStringConverter = null)
	{
		parent::__construct($majorToStringConverter, new php\integer\converter\toString\any('*'), new php\integer\converter\toString\blackhole);
	}
}
