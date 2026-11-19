<?php

namespace App\Controller\Api\Posts;

use App\Dtos\CreatePostDto;
use App\Services\PostService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/posts')]
final class UpdatePostController extends AbstractController
{
    #[Route('/{id}', name: 'posts.update', methods:["PUT"])]
    public function __invoke(
        int $id, 
        PostService $postService,
        #[MapRequestPayload()] CreatePostDto $data,
    ): JsonResponse
    {
        $post = $postService->update($id, $data);
        
        return $this->json([
            'message' => 'Modification avec succes',
            'post' => $post,
        ]);
    }
}
