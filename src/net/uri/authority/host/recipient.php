<?php namespace norsys\score\net\authority\host;

use norsys\score\net\authority\host;

interface recipient
{
	function hostInUriIs(host $host) :void;
}
