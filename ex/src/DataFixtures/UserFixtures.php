<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture implements FixtureGroupInterface
{
    public function __construct(private UserPasswordHasherInterface $passwordHasher)    {}
    public static function getGroups(): array
    {
        return ['users'];
    }

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $i = 0;
        while ($i < 10)
        {
            $user = new User();
            $user->setUsername('user' . $i);
            $hashed = $this->passwordHasher->hashPassword($user, 'password' . $i);
            $user->setPassword($hashed);
            $user->setRoles(['ROLE_USER']);
            $manager->persist($user);
            $i++;
        }
        $manager->flush();
    }
}
