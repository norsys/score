<?php namespace norsys\score\composer;

use norsys\score\composer\part;
use norsys\score\php\string\recipient as stringRecipient;
use norsys\score\composer\depedency\{ name\recipient as nameRecipient, version\recipient as versionRecipient };

interface depedency extends part
{
	function recipientOfComposerDepedencyNameIs(nameRecipient $recipient) :void;
	function recipientOfComposerDepedencyVersionIs(versionRecipient $recipient) :void;
}
