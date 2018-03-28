<?php namespace norsys\score\fs\path;

use norsys\score\container\iterator;

interface container
{
	function blockForContainerIteratorIs(iterator\block $block) :void;
}
