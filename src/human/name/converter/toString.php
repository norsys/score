<?php namespace norsys\score\human\name\converter;

use norsys\score\php\string\recipient;
use norsys\score\human\name;

interface toString
{
	function recipientOfHumanNameAsStringIs(name $name, recipient $recipient) :void;
}
