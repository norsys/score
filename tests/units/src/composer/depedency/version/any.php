<?php namespace norsys\score\tests\units\composer\depedency\version;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\depedency\version')
		;
	}

	/**
	 * @dataProvider goodArgumentProvider
	 */
	function testRecipientOfStringIs_withArgument($string)
	{
		$this
			->given(
				$this->newTestedInstance($string),
				$recipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($string))
				->mock($recipient)
					->receive('stringIs')
						->withArguments($string)
							->once
		;
	}

	protected function goodArgumentProvider()
	{
		return [
			sprintf('%s', rand(0, PHP_INT_MAX)),
			sprintf('>%s', rand(0, PHP_INT_MAX)),
			sprintf('>=%s', rand(0, PHP_INT_MAX)),
			sprintf('<%s', rand(0, PHP_INT_MAX)),
			sprintf('<=%s', rand(0, PHP_INT_MAX)),
			sprintf('!=%s', rand(0, PHP_INT_MAX)),
			sprintf('%s.%s', rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX)),
			sprintf('>%s.%s', rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX)),
			sprintf('>=%s.%s', rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX)),
			sprintf('<%s.%s', rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX)),
			sprintf('<=%s.%s', rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX)),
			sprintf('!=%s.%s', rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX)),
			sprintf('%s.%s.%s', rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX)),
			sprintf('>%s.%s.%s', rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX)),
			sprintf('>=%s.%s.%s', rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX)),
			sprintf('<%s.%s.%s', rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX)),
			sprintf('<=%s.%s.%s', rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX)),
			sprintf('!=%s.%s.%s', rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX)),
			sprintf('~%s', rand(0, PHP_INT_MAX)),
			sprintf('~%s.%s', rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX)),
			sprintf('~%s.%s.%s', rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX)),
			sprintf('^%s', rand(0, PHP_INT_MAX)),
			sprintf('^%s.%s', rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX)),
			sprintf('^%s.%s.%s', rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX)),
			sprintf('%s - %s', rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX)),
			sprintf('%s.%s - %s', rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX)),
			sprintf('%s.%s - %s.%s', rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX)),
			sprintf('%s.%s.%s - %s.%s', rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX)),
			sprintf('%s.%s.%s - %s.%s.%s', rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX)),
			sprintf('%s.*', rand(0, PHP_INT_MAX)),
			sprintf('%s.%s.*', rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX)),
			sprintf('%s || %s', rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX)),
			sprintf('%s.%s || %s', rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX)),
			sprintf('%s || %s.%s', rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX)),
			sprintf('%s.%s || %s.%s', rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX)),
			sprintf('%s.%s.%s || %s.%s', rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX)),
			sprintf('%s.%s.%s || %s.%s.%s', rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX)),
			sprintf('%s.* || %s.*', rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX)),
			sprintf('%s.%s.* || %s.*', rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX)),
			sprintf('%s.%s.* || %s.%s.*', rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX)),
			sprintf('%s || %s || %s', rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX)),
			sprintf('%s-stable', rand(0, PHP_INT_MAX)),
			sprintf('%s.*-stable', rand(0, PHP_INT_MAX)),
			sprintf('%s.%s-stable', rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX)),
			sprintf('%s.%s.%s-stable', rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX)),
			sprintf('%s-dev', rand(0, PHP_INT_MAX)),
			sprintf('%s-alpha', rand(0, PHP_INT_MAX)),
			sprintf('%s-beta', rand(0, PHP_INT_MAX)),
			sprintf('%s-RC', rand(0, PHP_INT_MAX)),
			sprintf('%s-stable', rand(0, PHP_INT_MAX)),
			sprintf('%s.*-dev', rand(0, PHP_INT_MAX)),
			sprintf('%s.%s-dev', rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX)),
			sprintf('%s.%s.%s-dev', rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX), rand(0, PHP_INT_MAX)),
			'>=1.4.0.0-dev',
			'>=1.4.0.0-dev <1.5.0.0-dev',
			'1.0.*@beta'
		];
	}

	/**
	 * @dataProvider badArgumentProvider
	 */
	function test__construct_withBadArgument($argument)
	{
		$this
			->exception(function() use ($argument) {
					$this->newTestedInstance($argument);
				}
			)
				->isInstanceOf('invalidArgumentException')
				->hasMessage('Argument must be a valid composer version')
		;
	}

	protected function badArgumentProvider()
	{
		return [
			''
		];
	}
}
