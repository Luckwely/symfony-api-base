<?php

namespace App\Controller\Api\Posts;

use App\Services\PostService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/posts')]
final class DeletePostController extends AbstractController
{
    #[Route('/{id}', name: 'posts.delete', methods:["DELETE"])]
    public function __invoke(int $id, PostService $postService): JsonResponse
    {
        $postService->remove($id);
        
        return $this->json([
            'message' => 'suppression avec succes',
        ]);
    }
}
