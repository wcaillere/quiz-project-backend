<?php

namespace App\DataFixtures;

use App\Entity\Status;
use App\Factory\AnswerFactory;
use App\Factory\DifficultyFactory;
use App\Factory\QuestionFactory;
use App\Factory\QuizFactory;
use App\Factory\StatusFactory;
use App\Factory\ThemeFactory;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use function Zenstruck\Foundry\faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Création des utilisateurs
        UserFactory::createMany(3);

        // Création des données nécessaires pour les quiz
        ThemeFactory::createMany(5);

        StatusFactory::createOne(['name' => 'created']);
        StatusFactory::createOne(['name' => 'validated']);
        StatusFactory::createOne(['name' => 'rejected']);
        StatusFactory::createOne(['name' => 'online']);
        StatusFactory::createOne(['name' => 'disabled']);

        DifficultyFactory::createOne(['name' => 'easy']);
        DifficultyFactory::createOne(['name' => 'medium']);
        DifficultyFactory::createOne(['name' => 'hard']);

        QuizFactory::createMany(5, function () {
            return [
                'title' => faker()->text(20),
                'creator' => UserFactory::random(),
                'themes' => ThemeFactory::randomRange(1, 3),
                'difficulty' => DifficultyFactory::random(),
                'status' => StatusFactory::random(),
                'questions' => QuestionFactory::new(function () {
                    return [
                        'answers' => AnswerFactory::new()->many(4, 4)
                    ];
                })->many(3, 6)
            ];
        });

        // Création des tentatives et notes des utilisateurs
        //TODO Créer les factories des entités puis les utiliser
    }
}
