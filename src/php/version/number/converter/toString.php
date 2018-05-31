<?php namespace norsys\score\php\version\number\converter;

use norsys\score\php\version\number;
use norsys\score\php\string\recipient;

interface toString
{
	function recipientOfPhpVersionNumberAsStringIs(number $number, recipient $recipient) :void;
}
