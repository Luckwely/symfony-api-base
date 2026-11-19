<?php

namespace App\Services;

use App\Dtos\CreatePostDto;
use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class PostService 
{
    public function __construct(
        private PostRepository $postRepository
    )
    {}
    public function save($post){
        return $this->postRepository->save($post);
    }

     public function findlatest(): array{
        return $this->postRepository->findLatest();
    }

    public function remove(int $id):void
    {
        $post = $this->postRepository->find($id);
        if (!$post){
            throw new NotFoundHttpException("Post not found");
        }
        $this->postRepository->remove($post);
    }

    public function update(int $id, CreatePostDto $data): Post
    {
        $post = $this->postRepository->find($id);
        if (!$post){
            throw new NotFoundHttpException("Post not found");
        }

        return $this->postRepository->update($post, $data);
    }
}