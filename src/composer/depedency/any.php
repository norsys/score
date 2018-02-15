<?php namespace norsys\score\composer\depedency;

use norsys\score\{ composer, composer\depedency };

class any
	implements
		depedency
{
	private
		$name,
		$version
	;

	function __construct(depedency\name $name, depedency\version $version)
	{
		$this->name = $name;
		$this->version = $version;
	}

	function recipientOfComposerDepedencyNameIs(depedency\name\recipient $recipient) :void
	{
		$recipient->nameOfComposerDepedencyIs($this->name);
	}

	function recipientOfComposerDepedencyVersionIs(depedency\version\recipient $recipient) :void
	{
		$recipient->versionOfComposerDepedencyIs($this->version);
	}
}
