<?php namespace norsys\score\composer\fs\path;

use norsys\score\composer\autoload\classmap;
use norsys\score\composer;
use norsys\score\fs\path;
use norsys\score\serializer\keyValue as serializer;
use norsys\score\container\iterator\block\functor;

class fork
	implements
		composer\fs\path
{
	private
		$root,
		$container
	;

	function __construct(path $root, path\container $container)
	{
		$this->root = $root;
		$this->container = $container;
	}

	function keyValueSerializerIs(serializer $serializer) :void
	{
		$this->container
			->blockForContainerIteratorIs(
				new functor(
					function($iterator, $path) use ($serializer)
					{
						(
							new path\operator\unary\filename\append(
								$this->root,
								new path\factory\filename\container\unix\relative
							)
						)
							->recipientOfOperationWithFsPathIs(
								$path,
								new path\recipient\functor(
									function($path) use ($serializer)
									{
										(
											new composer\autoload\classmap\path\fs($path)
										)
											->keyValueSerializerIs($serializer)
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
