<?php namespace norsys\score\composer\depedency\version\semver\converter\toString\dot\major;

use norsys\score\{ composer\depedency\version\semver\converter\toString, php, composer\depedency\version\semver };

class wildcard extends toString\dot\aggregator
{
	function __construct(semver\number\converter\toString $majorToStringConverter = null)
	{
		parent::__construct($majorToStringConverter, new semver\number\converter\toString\any('*'), new semver\number\converter\toString\blackhole);
	}
}
