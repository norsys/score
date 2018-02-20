<?php namespace norsys\score\composer\depedency\version\semver;

use norsys\score\composer\depedency\version\semver;

class initial extends semver\any
	implements
		semver
{
	function __construct(semver\number $minor = null, semver\number $patch = null, semver\converter\toString $semverToStringConverter = null)
	{
		parent::__construct(
			new semver\number\initial,
			$minor,
			$patch,
			$semverToStringConverter
		);
	}
}
