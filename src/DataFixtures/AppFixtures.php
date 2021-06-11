<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Code;
use Cocur\Slugify\Slugify;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\HttpFoundation\File\File;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        $slugify = new Slugify();

        for ($c = 0; $c < 50; $c++) {
            $code = new Code();
            $code->setName($faker->name);
            $code->setSlug($slugify->slugify($code->getName()));
            $code->setPicture(new File('images/logoEric.jpg'));
            //$code->setPictureFile(new File('public/images/logoEric.jpg'));
            $code->setDescription($faker->text($maxNbChars = 200));
            $code->setLink($faker->url);
            $code->setCreatedAt($faker->dateTimeBetween($startDate = '-6 months', $endDate = 'now'));
            $code->setUpdatedAt($faker->dateTimeBetween($startDate = '-6 months', $endDate = 'now'));

            $manager->persist($code);
        }

        $manager->flush();
    }
}
