<?php namespace norsys\score\fs\path;

use norsys\score\fs\path;

interface recipient
{
	function fsPathIs(path $path) :void;
}
