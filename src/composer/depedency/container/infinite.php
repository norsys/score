<?php namespace norsys\score\composer\depedency\container;

use norsys\score\{ composer, container };

class infinite
	implements
		composer\depedency\container
{
	private
		$depedencies
	;

	function __construct(composer\depedency... $depedencies)
	{
		$this->depedencies = $depedencies;
	}

	function blockForContainerIteratorIs(container\iterator $iterator, container\iterator\block $block) :void
	{
		$iterator->variablesForIteratorBlockAre($block, ... $this->depedencies);
	}
}
