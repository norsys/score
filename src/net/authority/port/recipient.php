<?php namespace norsys\score\net\authority\port;

use norsys\score\net\authority\port;

interface recipient
{
	function portInUriIs(port $port) :void;
}
