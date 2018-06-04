<?php namespace norsys\score;

interface trampoline
{
	function argumentsForBlockAre(php\block $block, ... $arguments) :void;
}
