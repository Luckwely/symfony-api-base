<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use App\Controller\Api\Data;

final class HomeController extends AbstractController
{
    private array|null $data = null;

    public function __construct()
    {
        $this->data = [
            new Data("123", "Learn symfony"),
            new Data("234", "Learn react"),
        ];
    }

    #[Route('/api', name: 'home', methods:['GET'])]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'cours' => $this->data
        ]);
    }
}
