<?php namespace norsys\score\tests\units\composer\root\project\bsd;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;
use norsys\score\composer\{ type, license\bsd };
use norsys\score\serializer\keyValue as serializer;
use mock\norsys\score as mockOfScore;

class threeClause extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\root')
		;
	}

	function testKeyValueSerializerIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$name = new mockOfScore\composer\root\name,
					$part = new mockOfScore\composer\root\part,
					$otherPart = new mockOfScore\composer\root\part
				),
				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($name, $part, $otherPart))
				->mock($serializer)
					->receive('objectToSerializeIs')
						->withArguments(new serializer\part\container\fifo(new type\project, $name, new bsd\threeClause, $part, $otherPart))
							->once
		;
	}
}
