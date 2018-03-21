<?php namespace norsys\score\php\string\provider;

use norsys\score\php\string\{ provider, recipient, recipient\buffer, any };
use norsys\score\container\iterator\{ fifo, block };

class suffix extends suffix\provider
{
	function __construct(string $suffix, provider... $providers)
	{
		parent::__construct(new any($suffix), ... $providers);
	}
}
