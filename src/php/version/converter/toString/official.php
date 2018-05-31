<?php namespace norsys\score\php\version\converter\toString;

use norsys\score\php\{ version\converter\toString, version, string\recipient };
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
					function($trampoline) use ($version)
					{
						$version
							->toStringConverterOfMajorNumberInPhpVersionForRecipientIs(
								new recipient\trampoline($trampoline),
								$this->converter
							)
						;
					}
				),
				new trampoline\functor(
					function($trampoline, $major) use ($version)
					{
						$version
							->toStringConverterOfMinorNumberInPhpVersionForRecipientIs(
								new recipient\trampoline($trampoline),
								$this->converter
							)
						;
					}
				),
				new trampoline\functor(
					function($trampoline, $major, $minor) use ($version)
					{
						$version
							->toStringConverterOfReleaseNumberInPhpVersionForRecipientIs(
								new recipient\trampoline($trampoline),
								$this->converter
							)
						;
					}
				),
				new trampoline\functor(
					function($trampoline, $major, $minor, $release) use ($recipient)
					{
						$recipient->stringIs($major . '.' . $minor . '.' . $release);
					}
				)
			)
		)
			->trampolineArgumentsAre()
		;
	}
}
