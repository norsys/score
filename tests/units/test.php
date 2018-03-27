<?php

namespace norsys\score\tests\units;

use mageekguy\atoum\mock;
use norsys\score\php\string\{ provider, recipient };

abstract class test extends \atoum
{
	function beforeTestMethod($method)
	{
		mock\controller::disableAutoBindForNewMock();

		$this->mockGenerator
			->allIsInterface()
			->eachInstanceIsUnique()
		;

		return parent::beforeTestMethod($method);
	}

	protected function providerHasString(provider $provider, string $string)
	{
		$this->calling($provider)->recipientOfStringIs = function($aRecipient) use ($string) {
			$aRecipient->stringIs($string);
		};
	}
}
