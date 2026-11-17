<?php

namespace App\Controller\Api\Posts;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/posts')]
final class ListPostController extends AbstractController
{
    #[Route('', name: 'posts.index', methods:['GET'])]
    public function __invoke()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/Api/Posts/ListPostController.php',
        ]);
    }
}
