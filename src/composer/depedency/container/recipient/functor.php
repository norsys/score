<?php namespace norsys\score\composer\depedency\container\recipient;

use norsys\score\{ composer\depedency, php };

class functor extends php\block\functor
	implements
		depedency\container\recipient
{
	function composerDepedenciesIs(depedency\container $depedencies) :void
	{
		parent::blockArgumentsAre($depedencies);
	}
}
