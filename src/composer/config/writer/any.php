<?php namespace norsys\score\composer\config\writer;

use norsys\score\{ composer, php };

class any
	implements
		composer\config\writer
{
	private
		$depedencies,
		$extra
	;

	function __construct(
		composer\config\writer\depedencies $depedencies,
		composer\config\writer\extra $extra,
		composer\config\writer\autoloader\psr4 $psr4
	)
	{
		$this->depedencies = $depedencies;
		$this->extra = $extra;
		$this->psr4 = $psr4;
	}

	function recipientOfStringForComposerConfigIs(composer\config $config, php\string\recipient $recipient) :void
	{
		$separator = '';
		$buffer = '{';
		$bufferizer = new php\string\recipient\functor(
			function($string) use (& $buffer, & $separator)
			{
				$buffer .= $separator . PHP_EOL;
				$buffer .= "	" . $string;
				$separator = ',';
			}
		);

		$config
			->recipientOfComposerDepedenciesIs(
				new composer\depedency\container\recipient\functor(
					function($depedencies) use ($bufferizer)
					{
						$this->depedencies
							->recipientOfStringForDepedenciesFromComposerDepedenciesIs(
								$depedencies,
								$bufferizer
							)
						;
					}
				)
			)
		;

		$this->extra
			->recipientOfStringForExtraFromComposerConfigIs(
				$config,
				$bufferizer
			)
		;

		$this->psr4
			->recipientOfStringForPsr4AutoloaderFromComposerConfigIs(
				$config,
				$bufferizer
			)
		;

		$buffer .= PHP_EOL;
		$buffer .= '}';

		$recipient->stringIs($buffer);
	}
}
