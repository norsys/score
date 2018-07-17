<?php namespace norsys\score\composer\depedency\version;

use norsys\score\{
	composer\depedency,
	php
};

interface semver extends depedency\version
{
	function recipientOfMajorNumberInSemverIs(semver\number\recipient $recipient) :void;
	function recipientOfMajorNumberAsStringFromConverterIs(semver\number\converter\toString $converter, php\string\recipient $recipient) :void;
	function recipientOfMinorNumberInSemverIs(semver\number\recipient $recipient) :void;
	function recipientOfMinorNumberAsStringFromConverterIs(semver\number\converter\toString $converter, php\string\recipient $recipient) :void;
	function recipientOfPatchNumberInSemverIs(semver\number\recipient $recipient) :void;
	function recipientOfPatchNumberAsStringFromConverterIs(semver\number\converter\toString $converter, php\string\recipient $recipient) :void;
}
