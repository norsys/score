<?php namespace norsys\score\composer\depedency\name;

use norsys\score\php;
use norsys\score\composer\depedency\{ name, name\vendor, name\project };

class any
	implements
		name
{
	private
		$vendor,
		$project,
		$formater
	;

	function __construct(vendor $vendor, project $project, php\string\formater $formater = null)
	{
		$this->vendor = $vendor;
		$this->project = $project;
		$this->formater = $formater ?: new php\string\formater\sprintf('%s/%s');
	}

	function recipientOfStringIs(php\string\recipient $recipient) :void
	{
		$this->vendor
			->recipientOfStringIs(
				new php\string\recipient\functor(
					function($vendor) use ($recipient)
					{
						$this->project
							->recipientOfStringIs(
								new php\string\recipient\functor(
									function($project) use ($vendor, $recipient)
									{
										$this->formater
											->stringsForRecipientOfFormatedStringAre(
												$recipient,
												$vendor,
												$project
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
