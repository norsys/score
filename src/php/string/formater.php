<?php namespace norsys\score\php\string;

use norsys\score\php;

interface formater
{
	function stringsForRecipientOfFormatedStringAre(php\string\recipient $recipient, string... $strings) :void;
}
