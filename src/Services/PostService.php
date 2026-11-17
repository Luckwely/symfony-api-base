<?php

namespace App\Services;

use App\Repository\PostRepository;

final class PostService 
{
    public function __construct(
        private PostRepository $postRepository
    )
    {}
    public function save($post){
        return $this->postRepository->save($post);
    }
}