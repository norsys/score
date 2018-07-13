<?php namespace norsys\score\php\integer;

use norsys\score\php;

interface provider extends php\string\provider
{
	function recipientOfIntegerIs(php\integer\recipient $recipient) :void;
}
