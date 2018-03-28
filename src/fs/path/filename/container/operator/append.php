<?php namespace norsys\score\fs\path\filename\container\operator;

use norsys\score\fs\path\filename\container;

class append
	implements
		container\operator
{
	private
		$factory
	;

	function __construct(container\factory $factory = null)
	{
		$this->factory = $factory ?: new container\factory\fifo;
	}

	function recipientOfOperationWithContainerAndContainerOfFsPathFilenameIs(container $container, container $otherContainer, container\recipient $recipient) :void
	{
		$container
			->recipientOfFsPathFilenameInContainerIs(
				new container\filename\recipient\functor(
					function(... $filenamesFromContainer) use ($otherContainer, $recipient)
					{
						$otherContainer
							->recipientOfFsPathFilenameInContainerIs(
								new container\filename\recipient\functor(
									function(... $filenamesFromOtherContainer) use ($filenamesFromContainer, $recipient)
									{
										$this->factory
											->filenamesToBuildContainerOfFsPathFilenameForRecipientAre(
												$recipient,
												... array_merge($filenamesFromContainer, $filenamesFromOtherContainer)
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
