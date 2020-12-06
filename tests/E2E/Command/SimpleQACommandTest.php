<?php declare(strict_types=1);

namespace App\Tests\E2E\Command;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;

class SimpleQACommandTest extends KernelTestCase
{
    public function testExecute()
    {
        $kernel = static::createKernel();
        $application = new Application($kernel);

        $command = $application->find('app:question-answer');
        $commandTester = new CommandTester($command);

        $commandTester->setInputs(['no'/*, 'true'*/]);

        $commandTester->execute(['command' => $command->getName()]);

        $output = $commandTester->getDisplay();

        $this->assertStringContainsString('Your answer: no', $output);
//        $this->assertStringContainsString('Nee, oder?! YES o NO, no es tan dificil imbecil!', $output);
//        $this->assertStringContainsString('Your answer: true', $output);
    }
}