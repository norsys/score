<?php namespace norsys\score\composer\part\container;

use norsys\score\container\iterator;
use norsys\score\composer\part;
use norsys\score\composer\autoload\psr4\mapping;
use norsys\score\serializer\{ keyValue as serializer, keyValue\part\container };

class fifo extends any
{
	function __construct(part... $parts)
	{
		parent::__construct(new iterator\fifo, ... $parts);
	}
}
