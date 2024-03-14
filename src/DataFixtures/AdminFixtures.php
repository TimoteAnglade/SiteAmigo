<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AdminFixtures extends Fixture
{

    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $admin = new User();
        $admin->setUsername("adminAmigo")
            ->setPassword($this->passwordHasher->hashPassword($admin, "marge donut stp sucre"))
            ->setRoles(array("ROLE_ADMINISTRATEUR"));
        $manager->persist($admin);

        $manager->flush();
    }
}
