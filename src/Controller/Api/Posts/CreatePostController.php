<?php

namespace App\Controller\Api\Posts;

use App\Dtos\CreatePostDto;
use App\Services\PostService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/posts')]
final class CreatePostController extends AbstractController
{
    #[Route('', name: 'posts.create', methods:['POST'], format: 'json')]
    public function __invoke(
        #[MapRequestPayload()] CreatePostDto $data,
        PostService $postService
    )
    {
        $postService->save($data);
        
        return $this->json([
            'message' => 'success',
        ]);
    }
}
