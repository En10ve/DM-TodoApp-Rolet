<?php

namespace App\Controller;

use App\Repository\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ApiTaskController extends AbstractController
{
    #[Route('/api/task', name: 'app_api_task')]
    public function index(): Response
    {
        return $this->render('api_task/index.html.twig', [
            'controller_name' => 'ApiTaskController',
        ]);
    }

    #[Route("/api/tasks", name: "api_tasks", methods: ["GET"])]
    public function getTasks(TaskRepository $taskRepository): JsonResponse
    {
        return $this->json($taskRepository->findAll());
    }
}

