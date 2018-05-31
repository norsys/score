<?php namespace norsys\score\php\version\converter;

use norsys\score\php\{ version, string\recipient };

interface toString
{
	function recipientOfPhpVersionAsStringIs(version $version, recipient $recipient) :void;
}
