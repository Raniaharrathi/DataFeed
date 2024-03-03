<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class ParseFileCommandTest extends KernelTestCase

{
    public function testSomething(): void
    {
        $kernel = self::bootKernel();

        $application = new Application(self::$kernel);

        $command = $application->find('app:parse-file');
        $commandTester = new CommandTester($command);
        $commandTester->execute([
            // pass arguments to the helper
            'input' => 'feed.xml',
            'target' => 'sqlite',

        ]);

        $commandTester->assertCommandIsSuccessful();

        // the output of the command in the console
        $output = $commandTester->getDisplay();
        $this->assertStringContainsString('sqlit', $output);

    }
    public function testWrongTarget(): void
    {
        $kernel = self::bootKernel();

        $application = new Application(self::$kernel);

        $command = $application->find('app:parse-file');
        $commandTester = new CommandTester($command);
        $commandTester->execute([
            // pass arguments to the helper
            'input' => 'feed.xml',
            'target' => 'sqlit',

        ]);

        // the output of the command in the console
        $output = $commandTester->getErrorOutput();
        $this->assertStringContainsString('Given Target sqlit is not supported', $output);

    }

    public function testWrongInput(): void
    {
        $kernel = self::bootKernel();

        $application = new Application(self::$kernel);

        $command = $application->find('app:parse-file');
        $commandTester = new CommandTester($command);
        $commandTester->execute([
            // pass arguments to the helper
            'input' => 'feeed.xml',
            'target' => 'sqlite',

        ]);

        // the output of the command in the console
        $output = $commandTester->getErrorOutput();
        $this->assertStringContainsString('Given Input feeed.xml sqlit is not supported', $output);

    }
   
}
