<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Article;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        
        $faker = Faker\Factory::create('fr_FR');
        
        $indexCategory = 1;
        
        for ($count = 0; $count < 20; $count++) {

            $user = new User();

            $user->setFirstname($faker->firstName());
            $user->setLastname($faker->lastName());
            $user->setUsername($user->getFirstname() . $user->getLastname());
            $user->setPassword($faker->password());
            $user->setEmail($faker->email());

            $manager->persist($user);

            $article = new Article();
            $article->setTitle("Article " . $count);
            $article->setContent($faker->sentence());
            $article->setImage($faker->image(null, 640, 480));
            $article->setUser($user);

            $manager->persist($article);


            for ($i=0; $i < 2; $i++) { 
                $caterogy = new Category();
                $caterogy->setTitle("Category" . $indexCategory);
                $caterogy->setDescription($faker->sentence());
                $caterogy->setImage($faker->image(null, 640, 480));
                $article->addCategory($caterogy);
                $manager->persist($caterogy);

                $indexCategory++;
            }

        }

        $manager->flush();
    }
}
