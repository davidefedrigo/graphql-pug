<?php

namespace App\GraphQL\Type;

use App\Application\Actors;
use App\Application\Movies;
use App\GraphQL\Type\Enum\SortOrder;
use App\GraphQL\Type\Input\MovieFilter;
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
                    'args' => [
                        'year' => Type::int()
                    ],
                    'resolve' => function($a, $args) {
                        return Movies::find(isset($args['year']) ? $args['year'] : null);
                    }
                ],
                'actors' => [
                    'type' => Type::listOf(TypeRegistry::actor()),
                    'args' => [
                        'matching' => Type::nonNull(Type::string()),
                    ],
                    'resolve' => function($a, $args) {
                            var_dump($args['matching']);
                        return isset($args['matching']) ? Actors::getAllMatching($args['matching']) : Actors::getAll();
                    }
                ],
                'directors' => [
                    'type' => Type::listOf(TypeRegistry::director()),
//                    'args' => [
//                        'title' => Type::nonNull(Type::string()),
//                    ],
                    'resolve' => function($a, $args) {
                        // $args['title']
                        return Directors::getAll();
                    }
                ]
            ],
        ]);
    }
}