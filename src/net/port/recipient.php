<?php namespace norsys\score\net\port;

use norsys\score\net\port;

interface recipient
{
	function portInUriIs(port $port) :void;
}
