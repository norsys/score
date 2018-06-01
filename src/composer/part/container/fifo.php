<?php namespace norsys\score\composer\part\container;

use norsys\score\{
	container\iterator,
	composer\part
};

class fifo extends any
{
	function __construct(part... $parts)
	{
		parent::__construct(new iterator\fifo, ... $parts);
	}
}
