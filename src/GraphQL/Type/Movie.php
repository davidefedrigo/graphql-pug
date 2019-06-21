<?php

namespace App\GraphQL\Type;

use App\Application\Actors;
use App\GraphQL\TypeRegistry;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class Movie extends ObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => [
                'id' => Type::id(),
                'title' => Type::string(),
                'actors' => [
                    'type' => Type::listOf(TypeRegistry::actor()),
                    'resolve' => function($movie, $args) {
                        return Actors::findByMovie($movie);
                    }
                ],
            ],

        ];
        parent::__construct($config);
    }
}