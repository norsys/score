<?php namespace norsys\score\composer\depedency;

use norsys\score\composer;

interface recipient
{
	function composerDepedencyIs(composer\depedency $depedency) :void;
}
