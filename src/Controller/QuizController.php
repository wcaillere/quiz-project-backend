<?php

namespace App\Controller;

use App\Repository\QuizRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;

class QuizController extends AbstractController
{
    #[Route('/quiz', name: 'app_quiz', methods: ['GET'])]
    public function index(SerializerInterface $serializer, QuizRepository $repository): Response
    {
        $quizzes = $repository->findAll();
        $data = $serializer->serialize($quizzes, JsonEncoder::FORMAT, ['groups' =>
            ['quiz', 'user', 'difficulty', 'status', 'theme', 'question', 'answer']
        ]);

        return new Response($data, Response::HTTP_OK, ['Content-type' => 'application/json']);
    }

    #[Route('/quiz/{id}', name: 'app_quiz_details', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function getOneQuiz(int $id, SerializerInterface $serializer, QuizRepository $repository): Response
    {
        $quiz = $repository->find($id);
        $data = $serializer->serialize($quiz, JsonEncoder::FORMAT, ['groups' =>
            ['quiz', 'user', 'difficulty', 'status', 'theme', 'question', 'answer']
        ]);

        return new Response($data, Response::HTTP_OK, ['Content-Type' => 'application/json']);
    }

    #[Route('/quiz', name: 'app_quiz_add', methods: ['POST'])]
    public function addOneQuiz(QuizRepository $repository, Request $request)
    {
        //TODO Passer par serializer pour save (car entités dans entités)
    }
}
