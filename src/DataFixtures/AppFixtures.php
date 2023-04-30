<?php

namespace App\DataFixtures;

use App\Entity\Todo;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $todo = new Todo();
        $todo->setId(1);
        $todo->setNameOfSkill('Laravel');
        $manager->persist($todo);

        $manager->flush();
    }
}
