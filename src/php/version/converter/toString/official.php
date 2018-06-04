<?php namespace norsys\score\php\version\converter\toString;

use norsys\score\php\{ version\converter\toString, version, string\recipient, block };
use norsys\score\trampoline;

class official
	implements
		toString
{
	private
		$converter
	;

	function __construct(version\number\converter\toString $converter = null)
	{
		$this->converter = $converter ?: new version\number\converter\toString\asInteger;
	}

	function recipientOfPhpVersionAsStringIs(version $version, recipient $recipient) :void
	{
		(
			new trampoline\container\fifo(
				new trampoline\functor(
					function($block, $version)
					{
						$version
							->toStringConverterOfMajorNumberInPhpVersionForRecipientIs(
								new recipient\block($block),
								$this->converter
							)
						;
					}
				),
				new trampoline\functor(
					function($block, $version)
					{
						$version
							->toStringConverterOfMinorNumberInPhpVersionForRecipientIs(
								new recipient\block($block),
								$this->converter
							)
						;
					}
				),
				new trampoline\functor(
					function($block, $version)
					{
						$version
							->toStringConverterOfReleaseNumberInPhpVersionForRecipientIs(
								new recipient\block($block),
								$this->converter
							)
						;
					}
				)
			)
		)
			->argumentsForBlockAre(
				new block\functor(
					function ($version, $recipient, $major, $minor, $release)
					{
						$recipient->stringIs($major . '.' . $minor . '.' . $release);
					}
				),
				$version,
				$recipient
			)
		;
	}
}
