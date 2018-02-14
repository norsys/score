<?php namespace norsys\score\container\iterator;

use norsys\score\container;

interface block
{
	function containerIteratorHasValue(container\iterator $iterator, $value) :void;
}
