<?php namespace norsys\score\tests\units\php\string\regex;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class pcre extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\php\string\regex')
		;
	}

	function testConstructorWithSyntaxErrorInRegex()
	{
		$this
			->exception(function() { $this->newTestedInstance('^.*$/'); })
				->isInstanceOf('invalidArgumentException')
				->hasMessage('Syntax error in regular expression')
		;
	}

	function testRecipientOfRegexMatchingAgainstStringIs()
	{
		$this
			->given(
				$this->newTestedInstance($regex = '/^.*$/'),
				$string = uniqid(),
				$recipient = new mockOfScore\php\test\recipient
			)
			->if(
				$this->testedInstance->recipientOfRegexMatchingAgainstStringIs($string, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($regex))
				->mock($recipient)
					->receive('booleanIs')
						->withArguments(true)
							->once

			->given(
				$this->newTestedInstance($regex = '/^fo{1,2}bar$/')
			)

			->if(
				$this->testedInstance->recipientOfRegexMatchingAgainstStringIs($string, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($regex))
				->mock($recipient)
					->receive('booleanIs')
						->withArguments(false)
							->once

			->if(
				$this->testedInstance->recipientOfRegexMatchingAgainstStringIs('fobar', $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($regex))
				->mock($recipient)
					->receive('booleanIs')
						->withArguments(true)
							->twice

			->if(
				$this->testedInstance->recipientOfRegexMatchingAgainstStringIs('foobar', $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($regex))
				->mock($recipient)
					->receive('booleanIs')
						->withArguments(true)
							->thrice
		;
	}
}
