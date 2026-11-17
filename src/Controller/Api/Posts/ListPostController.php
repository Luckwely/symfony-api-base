<?php

namespace App\Controller\Api\Posts;

use App\Services\PostService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/posts')]
final class ListPostController extends AbstractController
{
    #[Route('', name: 'posts.index', methods: ['GET'])]
    public function __invoke(PostService $postService)
    {
        return $this->json([
            'posts' => $postService->findlatest()
        ]);
    }
}
