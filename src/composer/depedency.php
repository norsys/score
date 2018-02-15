<?php namespace norsys\score\composer;

use norsys\score\composer\depedency;

interface depedency
{
	function recipientOfComposerDepedencyNameIs(depedency\name\recipient $recipient) :void;
	function recipientOfComposerDepedencyVersionIs(depedency\version\recipient $recipient) :void;
}
