<?php namespace norsys\score;

interface container
{
	function blockForContainerIteratorIs(container\iterator $iterator, container\iterator\block $block) :void;
}
