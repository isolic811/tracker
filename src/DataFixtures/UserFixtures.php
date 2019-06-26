<?php

namespace App\DataFixtures;


use App\Entity\TUser;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
	private $passwordEncoder;

     public function __construct(UserPasswordEncoderInterface $passwordEncoder)
     {
         $this->passwordEncoder = $passwordEncoder;
     }
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
    	$user = new TUser();
        $user->setUsername("korisnik");

        $user->setRoles(['ROLE_USER']);

        $user->setPassword($this->passwordEncoder->encodePassword(
             $user,
             'pass1'
         ));
        $manager->persist($user);

        $user = new TUser();
        $user->setUsername("korisnik2");

        $user->setRoles(['ROLE_USER']);

        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'pass2'
        ));
        $manager->persist($user);

        $user = new TUser();
        $user->setUsername("korisnik3");

        $user->setRoles(['ROLE_USER']);

        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'pass3'
        ));
        $manager->persist($user);
        $manager->flush();
    }
}
