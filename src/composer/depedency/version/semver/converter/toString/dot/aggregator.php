<?php namespace norsys\score\composer\depedency\version\semver\converter\toString\dot;

use norsys\score\php\string\{
	recipient,
	provider,
	buffer
};
use norsys\score\{
	composer\depedency\version\semver,
	php\block
};

class aggregator extends semver\converter\toString\dot
{
	function recipientOfSemverVersionAsStringIs(semver $version, recipient $recipient) :void
	{
		(new buffer\join('.'))
			->recipientOfStringFromProviderIs(
				new provider\iterator\fifo(
					new provider\block(
						new block\functor(
							function($recipient) use ($version)
							{
								parent::recipientOfMajorInSemverVersionAsStringIs(
									$version,
									$recipient
								);
							}
						)
					),
					new provider\block(
						new block\functor(
							function($recipient) use ($version)
							{
								parent::recipientOfMinorInSemverVersionAsStringIs(
									$version,
									$recipient
								);
							}
						)
					),
					new provider\block(
						new block\functor(
							function($recipient) use ($version)
							{
								parent::recipientOfPatchInSemverVersionAsStringIs(
									$version,
									$recipient
								);
							}
						)
					)
				),
				$recipient
			)
		;
	}
}
