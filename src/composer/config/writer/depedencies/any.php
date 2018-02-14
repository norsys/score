<?php namespace norsys\score\composer\config\writer\depedencies;

use norsys\score\{ composer, php, container };

class any
	implements
		composer\config\writer\depedencies
{
	private
		$depedencyWriter
	;

	function __construct(composer\config\writer\depedencies\depedency $depedencyWriter)
	{
		$this->depedencyWriter = $depedencyWriter;
	}

	function recipientOfStringForDepedenciesFromComposerDepedenciesIs(composer\depedency\container $depedencies, php\string\recipient $recipient) :void
	{
		$buffer = 'require: {';

		$depedencies
			->blockForContainerIteratorIs(
				new container\iterator\fifo,
				new container\iterator\block\functor(
					function($iterator, $depedency) use (& $buffer, & $separator)
					{
						$this->depedencyWriter
							->recipientOfStringForComposerDepedencyIs(
								$depedency,
								new php\string\recipient\functor(
									function($string) use (& $buffer, & $separator)
									{
										$buffer .= $separator . PHP_EOL . '	' . $string;
										$separator = ',';
									}
								)
							)
						;
					}
				)
			)
		;

		$buffer .= PHP_EOL . '}';

		$recipient->stringIs($buffer);
	}
}
