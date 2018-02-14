<?php namespace norsys\score\composer;

interface config
{
	function recipientOfComposerDepedenciesIs(depedency\container\recipient $recipient) :void;
}
