<?php namespace norsys\score\composer\depedency\version;

use norsys\score\composer\depedency;

interface recipient
{
	function versionOfComposerDepedencyIs(depedency\version $version) :void;
}
