<?php namespace norsys\score\composer;

use norsys\score\serializer\keyValue as serializer;
use norsys\score\php\string\recipient as stringRecipient;
use norsys\score\composer\depedency\{ name\recipient as nameRecipient, version\recipient as versionRecipient };

interface depedency
{
	function recipientOfComposerDepedencyNameIs(nameRecipient $recipient) :void;
	function recipientOfComposerDepedencyVersionIs(versionRecipient $recipient) :void;
	function recipientOfStringMadeWithKeyValueSerializerIs(serializer $serializer, stringRecipient $recipient) :void;
}
