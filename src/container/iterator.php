<?php namespace norsys\score\container;

interface iterator
{
	function variablesForIteratorBlockAre(iterator\block $block, ... $variables) :void;
}
