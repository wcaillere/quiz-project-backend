<?php

namespace App\Controller;

use App\Repository\QuizRepository;
use \Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(SerializerInterface $serializer, QuizRepository $repository): Response
    {
        $quizzes = $repository->findAll();
        $data = $serializer->serialize($quizzes, JsonEncoder::FORMAT, ['groups' =>
            ['quiz', 'user', 'difficulty', 'status', 'theme', 'question', 'answer']
        ]);

        return new Response($data, Response::HTTP_OK, ['Content-type' => 'application/json']);
    }
}
