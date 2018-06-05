<?php namespace norsys\score\composer\authors;

use norsys\score\composer\root\part;
use norsys\score\composer\part\{ name\authors, anArray\named, container\fifo };
use norsys\score\serializer\keyValue as serializer;

class any extends named
	implements
		part
{
	function __construct(author... $authors)
	{
		parent::__construct(new authors, new fifo(... $authors));
	}
}
