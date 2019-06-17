<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class Article extends ObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => [
                'id' => Type::id()
            ],
        ];
        parent::__construct($config);
    }
}