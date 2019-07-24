<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setEmail('cmandonnet@outlook.fr');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPassword($this->passwordEncoder->encodePassword($admin, 'monAdmin'));
        $admin->setLastname('MANDONNET');
        $admin->setFirstname('Clélia');
        $admin->setGitHubLink('https://github.com/Mussuranae');
        $admin->setLinkedinLink('https://www.linkedin.com/in/cl%C3%A9lia-mandonnet/');

        $manager->persist($admin);
        $manager->flush();
    }
}
