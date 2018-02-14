<?php

namespace norsys\score\tests\units;

use
	mageekguy\atoum\mock
;

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
}
