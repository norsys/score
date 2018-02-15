<?php namespace norsys\score\composer\config\writer\depedencies\depedency;

use norsys\score\{ composer, composer\config\writer, php, composer\depedency };

class any
	implements
		writer\depedencies\depedency
{
	private
		$nameWriter,
		$versionWriter
	;

	function __construct(writer\depedencies\depedency\name $nameWriter, writer\depedencies\depedency\version $versionWriter)
	{
		$this->nameWriter = $nameWriter;
		$this->versionWriter = $versionWriter;
	}

	function recipientOfStringForComposerDepedencyIs(composer\depedency $depedency, php\string\recipient $recipient) :void
	{
		$depedency
			->recipientOfComposerDepedencyNameIs(
				new depedency\name\recipient\functor(
					function($depedencyName) use ($depedency, $recipient)
					{
						$depedency
							->recipientOfComposerDepedencyVersionIs(
								new depedency\version\recipient\functor(
									function($depedencyVersion) use ($depedencyName, $recipient)
									{
										$this->nameWriter
											->recipientOfStringForComposerDepedencyNameIs(
												$depedencyName,
												new php\string\recipient\functor(
													function($nameAsString) use ($depedencyVersion, $recipient) {
														$this->versionWriter
															->recipientOfStringForComposerDepedencyVersionIs(
																$depedencyVersion,
																new php\string\recipient\functor(
																	function($versionAsString) use ($nameAsString, $recipient) {
																		$recipient->stringIs(sprintf('"%s": "%s"', $nameAsString, $versionAsString));
																	}
																)
															)
														;
													}
												)
											)
										;
									}
								)
							)
						;
					}
				)
			)
		;
	}
}
