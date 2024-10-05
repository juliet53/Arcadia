<?php

namespace App\Tests\AnimalTest;

use App\Entity\Animal;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class AnimalTest extends KernelTestCase
{
    public function testSomething(): void
    {
        self::bootKernel();
        $container = static::getContainer();
        $animal = new Animal();
        $animal->setNom('test');
        $animal->setrace('test 2 ');
        $animal->setDescription('test 3 ');

        $errors = $container->get('validator')->validate($animal);
        $this->assertCount(0, $errors);
    }
}

// Run the test with the following command: php bin/phpunit tests/AnimalTest.php