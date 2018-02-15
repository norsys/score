<?php namespace norsys\score\composer\depedency\name\recipient;

use norsys\score\{ composer\depedency, php\block };

class functor extends block\functor
	implements
		depedency\name\recipient
{
	function nameOfComposerDepedencyIs(depedency\name $name) :void
	{
		parent::blockArgumentsAre($name);
	}
}
