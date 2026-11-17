<?php

namespace App\Dtos;

use Symfony\Component\Validator\Constraints as Assert;

class CreatePostDto {
    public function __construct(
        #[Assert\NotBlank]
        public readonly string $title,

        #[Assert\NotBlank]
        #[Assert\Length(min: 8)]
        public readonly string $description
    )
    {}
}