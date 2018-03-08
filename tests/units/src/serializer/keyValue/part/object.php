<?php namespace norsys\score\tests\units\serializer\keyValue\part;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class object extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\serializer\keyValue\part')
		;
	}

	function testKeyValueSerializerIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$part1 = new mockOfScore\serializer\keyValue\part,
					$part2 = new mockOfScore\serializer\keyValue\part,
					$part3 = new mockOfScore\serializer\keyValue\part
				),
				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($part1, $part2, $part3))
				->mock($part1)
					->receive('keyValueSerializerIs')
						->withArguments($serializer)
							->once
				->mock($part2)
					->receive('keyValueSerializerIs')
						->withArguments($serializer)
							->once
				->mock($part3)
					->receive('keyValueSerializerIs')
						->withArguments($serializer)
							->once
		;
	}
}
