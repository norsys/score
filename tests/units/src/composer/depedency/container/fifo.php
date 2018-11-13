<?php namespace norsys\score\tests\units\composer\depedency\container;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class fifo extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\depedency\container')
		;
	}

	function testKeyValueSerializerIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$depedency1 = new mockOfScore\composer\depedency,
					$depedency2 = new mockOfScore\composer\depedency,
					$depedency3 = new mockOfScore\composer\depedency
				),

				$depedencies = [],

				$this->calling($depedency1)->keyValueSerializerIs = function($aSerializer) use ($depedency1, & $depedencies) {
					$depedencies[] = $depedency1;
				},

				$this->calling($depedency2)->keyValueSerializerIs = function($aSerializer) use ($depedency2, & $depedencies) {
					$depedencies[] = $depedency2;
				},

				$this->calling($depedency3)->keyValueSerializerIs = function($aSerializer) use ($depedency3, & $depedencies) {
					$depedencies[] = $depedency3;
				},

				$serializer = new mockOfScore\serializer\keyValue
			)
			->if(
				$this->testedInstance->keyValueSerializerIs($serializer)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depedency1, $depedency2, $depedency3))
				->array($depedencies)
						->isEqualTo([ $depedency1, $depedency2, $depedency3 ])
		;
	}

	function testBlockForContainerIteratorIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$depedency1 = new mockOfScore\composer\depedency,
					$depedency2 = new mockOfScore\composer\depedency,
					$depedency3 = new mockOfScore\composer\depedency
				),

				$depedencies = [],

				$block = new mockOfScore\container\iterator\block,

				$this->calling($block)->containerIteratorHasValue = function($anIterator, $aValue) use (& $depedencies) {
					$depedencies[] =  $aValue;
				}
			)
			->if(
				$this->testedInstance->blockForContainerIteratorIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($depedency1, $depedency2, $depedency3))
				->array($depedencies)
					->isEqualTo([ $depedency1, $depedency2, $depedency3 ])
		;
	}
}
