<?php namespace norsys\score\composer\depedency\collection;

use norsys\score\composer;

interface recipient
{
	function composerDepedenciesAre(composer\depedency\collection $depedencies) :void;
}
