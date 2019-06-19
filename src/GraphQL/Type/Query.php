<?php

namespace App\GraphQL\Type;

use App\GraphQL\TypeRegistry;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class Query extends ObjectType
{
    public function __construct()
    {
        parent::__construct([
            'name' => 'Query',
            'fields' => [
                'me' => [
                    'type' => new User(),
                    'description' => 'Returns current user',
                    'resolve' => function ($root, $args) {
                        return [
                            'first_name' => $root['user_first_name']
                        ];
                    }
                ],
                'movies' => [
                    'type' => Type::listOf(TypeRegistry::movie()),
//                    'args' => [
//                        'title' => Type::nonNull(Type::string()),
//                    ],
                    'resolve' => function($a, $args) {
                        // $args['title']
                        return [
                            [
                                'id' => 1,
                            ],
                            [
                                'id' => 3
                            ]
                        ];
                    }
                ]
            ],
        ]);
    }
}