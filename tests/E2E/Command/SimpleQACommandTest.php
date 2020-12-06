<?php

namespace App\Tests\E2E\Command;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;
//use Symfony\Component\Console\Helper\HelperSet;
//use Symfony\Component\Console\Helper\QuestionHelper;

class SimpleQACommandTest extends KernelTestCase
{
    public function testExecute()
    {
        $kernel = static::createKernel();
        $application = new Application($kernel);

        $command = $application->find('app:question-answer');
        $commandTester = new CommandTester($command);

        $commandTester->setInputs(['yes', 'true']);

        $commandTester->execute(['command' => $command->getName()]);

        $output = $commandTester->getDisplay();

        $this->assertStringContainsString('Your answer: yes', $output);
        $this->assertStringContainsString('Your answer: true', $output);
    }
}