<?php namespace norsys\score\composer\part;

use norsys\score\composer\part;
use norsys\score\container\iterator;

interface container extends part
{
	function blockForContainerIteratorIs(iterator\block $block) :void;
}
