<?php namespace norsys\score\tests\units\net\uri\authority\host;

require __DIR__ . '/../../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\net\uri\authority\host')
		;
	}

	/**
	 * @dataProvider hostProvider
	 */
	function testRecipientOfStringIs_withHost($host)
	{
		$this
			->given(
				$this->newTestedInstance($host),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($host))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($host)
							->once
		;
	}

	protected function hostProvider()
	{
		return [
			'norsys',
			'norsys.fr',
			'666',
			'~',
			'$',
			'&',
			'%20',
			'%20%20'
		];
	}

	/**
	 * @dataProvider badHostProvider
	 */
	function testConstructor_withBadHost($host)
	{
		$this
			->exception(function() use ($host) { $this->newTestedInstance($host); })
				->isInstanceOf('invalidArgumentException')
				->hasMessage('Host must containes only *(ALPHA / DIGIT / "-" / "." / "_" / "~" /" %" HEXDIG HEXDIG / "!" / "$" / "&" / "\'" / "(" / ")" / "*" / "+" / "," / ";" / "=")')
		;
	}

	protected function badHostProvider()
	{
		return [
			' ',
		];
	}
}
