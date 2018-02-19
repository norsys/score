<?php namespace norsys\score\composer\depedency\version;

use norsys\score\composer\depedency;

interface semver extends depedency\version
{
	function recipientOfMajorNumberInSemverIs(semver\number\recipient $recipient) :void;
	function recipientOfMinorNumberInSemverIs(semver\number\recipient $recipient) :void;
	function recipientOfPatchNumberInSemverIs(semver\number\recipient $recipient) :void;
}
