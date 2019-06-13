<?php

namespace App\GraphQL\Type\Input;

use App\GraphQL\TypeRegistry;
use GraphQL\Type\Definition\InputObjectType;
use GraphQL\Type\Definition\Type;

class MovieFilter extends InputObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => [
                'title' => Type::string(),
                'year' => Type::int(),
                'language' => TypeRegistry::language()
            ],
        ];
        parent::__construct($config);
    }
}