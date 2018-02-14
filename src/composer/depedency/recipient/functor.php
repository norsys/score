<?php namespace norsys\score\composer\depedency\recipient;

use norsys\score\{ composer, php };

class functor extends php\block\functor
	implements
		composer\depedency\recipient
{
	function composerDepedencyIs(composer\depedency $depedency) :void
	{
		parent::blockArgumentsAre($depedency);
	}
}
