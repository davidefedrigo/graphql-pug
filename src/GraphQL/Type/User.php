<?php

namespace App\GraphQL\Type;

use App\GraphQL\TypeRegistry;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class User extends ObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => [
                'firstName' => [
                    'type' => Type::string(),
                    'resolve' => function ($root, $args) {
                        return $root['first_name'];
                    },
                ],
                'watchList' => [
                    'type' => Type::listOf(TypeRegistry::movie()),
                    'resolve' => function ($root, $args) {
                        return [
                            [
                                'id' => 2,
                                'title' => 'Back to the Future'
                            ]
                        ];
                    }
                ]
            ]
        ];
        parent::__construct($config);
    }
}