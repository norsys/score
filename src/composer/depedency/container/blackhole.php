<?php namespace norsys\score\composer\depedency\container;

use norsys\score\{ composer, container };

class blackhole
	implements
		composer\depedency\container
{
	function blockForContainerIteratorIs(container\iterator $iteraror, container\iterator\block $block) :void
	{
	}
}
