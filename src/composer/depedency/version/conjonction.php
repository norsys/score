<?php namespace norsys\score\composer\depedency\version;

use norsys\score\{ composer\depedency\version, php };

class conjonction
	implements
		version
{
	private
		$versions
	;

	function __construct(version $version1, version $version2, version... $versions)
	{
		array_unshift($versions, $version1, $version2);

		$this->versions = $versions;
	}

	function recipientOfStringIs(php\string\recipient $recipient) :void
	{
		$versions = [];

		foreach ($this->versions as $version)
		{
			$version
				->recipientOfStringIs(
					new php\string\recipient\functor(
						function($version) use (& $versions)
						{
							$versions[] = $version;
						}
					)
				)
			;
		}

		if ($versions)
		{
			$recipient->stringIs(join(' ', $versions));
		}
	}
}
