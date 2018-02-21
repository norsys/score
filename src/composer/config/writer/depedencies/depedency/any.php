<?php namespace norsys\score\composer\config\writer\depedencies\depedency;

use norsys\score\{ composer, composer\config\writer, php, composer\depedency };

class any
	implements
		writer\depedencies\depedency
{
	private
		$nameWriter,
		$versionWriter,
		$formater
	;

	function __construct(writer\depedencies\depedency\name $nameWriter = null, writer\depedencies\depedency\version $versionWriter = null, php\string\formater $formater = null)
	{
		$this->nameWriter = $nameWriter ?: new writer\depedencies\depedency\name\any;
		$this->versionWriter = $versionWriter ?: new writer\depedencies\depedency\version\any;
		$this->formater = $formater ?: new php\string\formater\sprintf('"%s": "%s"');
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
																		$this->formater
																			->stringsForRecipientOfFormatedStringAre(
																				$recipient,
																				$nameAsString,
																				$versionAsString
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
				)
			)
		;
	}
}
