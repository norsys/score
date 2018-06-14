<?php namespace norsys\score\tests\units\php\identifier\sensio\bundle\distribution\bundle;

require __DIR__ . '/../../../../../../../runner.php';

use norsys\score\tests\units\php\identifier;
use mock\norsys\score as mockOfScore;

class composer extends identifier
{
	function testRecipientOfStringIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stringIs')
						->withArguments('Composer')
							->once
		;
	}
}
