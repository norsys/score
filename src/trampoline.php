<?php namespace norsys\score;

use norsys\score\php\block;

interface trampoline
{
	function argumentsForBlockAre(block $block, ... $arguments) :void;
}
