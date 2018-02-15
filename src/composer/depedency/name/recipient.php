<?php namespace norsys\score\composer\depedency\name;

use norsys\score\composer\depedency;

interface recipient
{
	function nameOfComposerDepedencyIs(depedency\name $name) :void;
}
