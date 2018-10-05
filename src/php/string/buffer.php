<?php namespace norsys\score\php\string;

use norsys\score\php\{
	block,
	string\recipient,
	string\provider
};

interface buffer
{
	function recipientOfStringFromBufferIs(recipient $recipient) :void;
	function stringForBufferIs(string $string) :void;
	function recipientOfStringFromProviderIs(provider $provider, recipient $recipient) :void;
}
