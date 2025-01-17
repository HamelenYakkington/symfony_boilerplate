<?php

namespace App\DataFixtures;

use App\Entity\Task;
use App\Entity\User;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TaskFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $user = $this->getReference('USER',User::class);

        $task1 = new Task();
        $task1->setName("task1");
        $task1->setDesciption("Lorem Ipsum");
        $task1->updateTimestamps();
        $task1->setAuthor($user);

        $task2 = new Task();
        $task2->setName("task2");
        $task2->setDesciption("Lorem Ipsum");
        $task2->updateTimestamps();
        $task2->setAuthor($user);

        $manager->persist($task1);
        $manager->persist($task2);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            UserFixture::class
        ];
    }
}
