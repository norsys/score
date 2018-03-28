<?php namespace norsys\score\fs\path\operator\unary\filename;

use norsys\score\fs\{ path, path\recipient, path\factory\filename\container as factory, path\filename\container\operator, path\filename\container };

class any
{
	private
		$path,
		$factory,
		$operator
	;

	function __construct(path $path, factory $factory, operator $operator)
	{
		$this->path = $path;
		$this->factory = $factory;
		$this->operator = $operator;
	}

	function recipientOfOperationWithFsPathIs(path $otherPath, recipient $recipient) :void
	{
		$this->path
			->recipientOfFilenameContainerFromFsPathIs(
				new container\recipient\functor(
					function($containerFromPath) use ($otherPath, $recipient)
					{
						$otherPath
							->recipientOfFilenameContainerFromFsPathIs(
								new container\recipient\functor(
									function($containerFromOtherPath) use ($containerFromPath, $recipient)
									{
										$this->operator
											->recipientOfOperationWithContainerAndContainerOfFsPathFilenameIs(
												$containerFromPath,
												$containerFromOtherPath,
												new container\recipient\functor(
													function($container) use ($recipient)
													{
														$this->factory
															->recipientOfFsPathWithFsPathFilenameFromContainerIs(
																$container,
																$recipient
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
