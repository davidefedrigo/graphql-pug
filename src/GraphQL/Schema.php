<?php

namespace App\GraphQL;

use App\GraphQL\Type\Movie;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class Schema extends \GraphQL\Type\Schema
{
    public function __construct()
    {
        parent::__construct([
            'query' => $queryType = new ObjectType([
                'name' => 'Query',
                'fields' => [
                    'me' => [
                        'type' => Type::string(),
                        'resolve' => function ($root, $args) {
                            return $root['user'];
                        }
                    ],
                    'movies' => [
                        'type' => Type::listOf(new Movie()),
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
                                    'id' => 2
                                ]
                            ];
                        }
                    ]
                ],
            ])
        ]);
    }
}