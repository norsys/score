<?php namespace norsys\score\net\uri\converter\toString;

use norsys\score\{
	net\uri,
	net\uri\converter\toString,
	php\string\recipient,
	php\string\provider,
	php\string\buffer
};

class rfc3986
	implements
		toString
{
	private
		$schemeConverter,
		$hierPartConverter
	;

	function __construct(uri\scheme\converter\toString $schemeConverter, uri\hierPart\converter\toString $hierPartConverter)
	{
		$this->schemeConverter = $schemeConverter;
		$this->hierPartConverter = $hierPartConverter;
	}

	function recipientOfNetUriAsStringIs(uri $uri, recipient $recipient) :void
	{
		$uri
			->recipientOfNetUriSchemeAsStringFromConverterIs(
				$this->schemeConverter,
				new recipient\functor(
					function($scheme) use ($uri, $recipient)
					{
						(
							new buffer\infinite($scheme)
						)
							->recipientOfStringFromProviderIs(
								new provider\functor(
									function($recipient) use ($uri)
									{
										$uri
											->recipientOfNetUriHierPartAsStringFromConverterIs(
												$this->hierPartConverter,
												new recipient\prefix(
													':',
													$recipient
												)
											)
										;
									}
								),
								$recipient
							)
						;
					}
				)
			)
		;
	}
}
