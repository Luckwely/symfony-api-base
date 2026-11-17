<?php

namespace App\Controller\Api;

class Data {
    public function __construct(
        public string $id,
        public string $title
    )
    {
    }
}