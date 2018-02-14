<?php namespace norsys\score\tests\units\composer\config\writer;

require __DIR__ . '/../../../../runner.php';

use norsys\score\tests\units;
use mock\norsys\score as mockOfScore;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('norsys\score\composer\config\writer')
		;
	}

	function testComposerConfigIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$depedenciesWriter = new mockOfScore\composer\config\writer\depedencies,
					$extraWriter = new mockOfScore\composer\config\writer\extra,
					$autoloaderPsr4Writer = new mockOfScore\composer\config\writer\autoloader\psr4
				),
				$config = new mockOfScore\composer\config,
				$stringRecipient = new mockOfScore\php\string\recipient
			)
			->if(
				$this->testedInstance->recipientOfStringForComposerConfigIs($config, $stringRecipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo(
						$this->newTestedInstance(
							$depedenciesWriter,
							$extraWriter,
							$autoloaderPsr4Writer
						)
					)
				->mock($stringRecipient)
					->receive('stringIs')
						->withArguments(
							'{' . PHP_EOL .
							'}'
						)
						->once

			->given(
				$depedencies = new mockOfScore\composer\depedency\container,
				$this->calling($config)->recipientOfComposerDepedenciesIs = function($recipient) use ($depedencies) {
					$recipient->composerDepedenciesIs($depedencies);
				},

				$jsonDepedencies = uniqid(),
				$this->calling($depedenciesWriter)->recipientOfStringForDepedenciesFromComposerDepedenciesIs = function($aDepedencies, $aRecipient) use ($depedencies, $jsonDepedencies) {
					if ($aDepedencies == $depedencies)
					{
						$aRecipient->stringIs($jsonDepedencies);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfStringForComposerConfigIs($config, $stringRecipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo(
						$this->newTestedInstance(
							$depedenciesWriter,
							$extraWriter,
							$autoloaderPsr4Writer
						)
					)
				->mock($stringRecipient)
					->receive('stringIs')
						->withArguments(
							  "{" . PHP_EOL
							. "	" . $jsonDepedencies . PHP_EOL
							. "}"
						)
						->once

			->given(
				$jsonExtra = uniqid(),
				$this->calling($extraWriter)->recipientOfStringForExtraFromComposerConfigIs = function($aConfig, $aRecipient) use ($config, $jsonExtra) {
					if ($aConfig == $config)
					{
						$aRecipient->stringIs($jsonExtra);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfStringForComposerConfigIs($config, $stringRecipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo(
						$this->newTestedInstance(
							$depedenciesWriter,
							$extraWriter,
							$autoloaderPsr4Writer
						)
					)
				->mock($stringRecipient)
					->receive('stringIs')
						->withArguments(
							  "{" . PHP_EOL
							. "	" . $jsonDepedencies . ',' . PHP_EOL
							. "	" . $jsonExtra . PHP_EOL
							. "}"
						)
						->once

			->given(
				$jsonAutoloaderPsr4 = uniqid(),
				$this->calling($autoloaderPsr4Writer)->recipientOfStringForPsr4AutoloaderFromComposerConfigIs = function($aConfig, $aRecipient) use ($config, $jsonAutoloaderPsr4) {
					if ($aConfig == $config)
					{
						$aRecipient->stringIs($jsonAutoloaderPsr4);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfStringForComposerConfigIs($config, $stringRecipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo(
						$this->newTestedInstance(
							$depedenciesWriter,
							$extraWriter,
							$autoloaderPsr4Writer
						)
					)
				->mock($stringRecipient)
					->receive('stringIs')
						->withArguments(
							  "{" . PHP_EOL
							. "	" . $jsonDepedencies . ',' . PHP_EOL
							. "	" . $jsonExtra . ',' . PHP_EOL
							. "	" . $jsonAutoloaderPsr4. PHP_EOL
							. "}"
						)
						->once
		;
	}
}
