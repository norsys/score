<?php namespace norsys\score\composer\depedency\version\recipient;

use norsys\score\{ composer\depedency, php\block };

class functor extends block\functor
	implements
		depedency\version\recipient
{
	function versionOfComposerDepedencyIs(depedency\version $version) :void
	{
		parent::blockArgumentsAre($version);
	}
}
