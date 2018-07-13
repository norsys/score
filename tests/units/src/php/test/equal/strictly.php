<?php namespace norsys\score\tests\units\php\test\equal;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class strictly extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\test')
		;
	}

	/**
	 * @dataProvider argumentsProvider
	 */
	function testRecipientOfTestOnVariableIs($reference, $variable, $boolean)
	{
		$this
			->given(
				$this->newTestedInstance(
					$reference
				),
				$recipient = new mockOfScore\php\test\recipient
			)
			->if(
				$this->testedInstance->recipientOfTestOnVariableIs($variable, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($reference))
				->mock($recipient)
					->receive('booleanIs')
						->withArguments($boolean)
							->once
		;
	}

	protected function argumentsProvider()
	{
		return [
			[ '', '', true ],
			[ '', 0, false ],
			[ '', 0., false ],
			[ '', false, false ],
			[ '', null, false ],
			[ '', uniqid(), false ],
			[ '', [], false ],
			[ '', range(0, 9), false ],
			[ '', new \stdclass, false ],

			[ 0, 0, true ],
			[ 0, '', false ],
			[ 0, 0., false ],
			[ 0, false, false ],
			[ 0, null, false ],
			[ 0, rand(PHP_INT_MIN, -1), false ],
			[ 0, rand(1, PHP_INT_MAX), false ],
			[ 0, [], false ],
			[ 0, range(0, 9), false ],
			[ 0, new \stdclass, false ],

			[ 0., 0., true ],
			[ 0., '', false ],
			[ 0., 0, false ],
			[ 0., false, false ],
			[ 0., null, false ],
			[ 0., (float) rand(PHP_INT_MIN, -1), false ],
			[ 0., (float) rand(1, PHP_INT_MAX), false ],
			[ 0., [], false ],
			[ 0., range(0, 9), false ],
			[ 0., new \stdclass, false ],

			[ false, false, true ],
			[ false, '', false ],
			[ false, 0, false ],
			[ false, 0, false ],
			[ false, null, false ],
			[ false, true, false ],
			[ false, rand(PHP_INT_MIN, PHP_INT_MAX), false ],
			[ false, (float) rand(PHP_INT_MIN, PHP_INT_MAX), false ],
			[ false, [], false ],
			[ false, range(0, 9), false ],
			[ false, new \stdclass, false ],

			[ null, null, true ],
			[ null, '', false ],
			[ null, 0, false ],
			[ null, 0, false ],
			[ null, false, false ],
			[ null, rand(PHP_INT_MIN, PHP_INT_MAX), false ],
			[ null, (float) rand(PHP_INT_MIN, PHP_INT_MAX), false ],
			[ null, [], false ],
			[ null, range(0, 9), false ],
			[ null, new \stdClass, false ],

			[ [], [], true ],
			[ [], null, false ],
			[ [], '', false ],
			[ [], 0, false ],
			[ [], 0, false ],
			[ [], false, false ],
			[ [], rand(PHP_INT_MIN, PHP_INT_MAX), false ],
			[ [], (float) rand(PHP_INT_MIN, PHP_INT_MAX), false ],
			[ [], range(0, 9), false ],
			[ [], new \stdClass, false ],

			[ $array = range(0, 9), $array, true ],
			[ $array, range(0, 8), false ],
			[ $array, [], false ],
			[ $array, null, false ],
			[ $array, '', false ],
			[ $array, 0, false ],
			[ $array, 0, false ],
			[ $array, false, false ],
			[ $array, rand(PHP_INT_MIN, PHP_INT_MAX), false ],
			[ $array, (float) rand(PHP_INT_MIN, PHP_INT_MAX), false ],
			[ $array, new \stdClass, false ],

			[ $object = new \stdclass, $object, true ],
			[ new \stdclass, new \stdclass, false ],
			[ new \stdclass, range(0, 9), false ],
			[ new \stdclass, [], false ],
			[ new \stdclass, null, false ],
			[ new \stdclass, '', false ],
			[ new \stdclass, 0, false ],
			[ new \stdclass, 0, false ],
			[ new \stdclass, false, false ],
			[ new \stdclass, rand(PHP_INT_MIN, PHP_INT_MAX), false ],
			[ new \stdclass, (float) rand(PHP_INT_MIN, PHP_INT_MAX), false ],
			[ new \stdclass, new \stdClass, false ],
		];
	}
}
