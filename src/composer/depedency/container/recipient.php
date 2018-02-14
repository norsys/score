<?php namespace norsys\score\composer\depedency\container;

use norsys\score\composer;

interface recipient
{
	function composerDepedenciesIs(composer\depedency\container $depedencies) :void;
}
