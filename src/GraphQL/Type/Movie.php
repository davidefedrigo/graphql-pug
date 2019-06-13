<?php

namespace App\GraphQL\Type;

use App\Application\Actors;
use App\Domain\Language;
use App\GraphQL\Resolver\MovieResolver;
use App\GraphQL\Type\Enum\Language as LanguageType;
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
                'title' => [
                    'type' => Type::string(),
                    'args' => [
                        'language' => TypeRegistry::language()
                    ],
                    'resolve' => MovieResolver::title()
                ],
                'runningTime' => [
                    'type' => Type::int(),
                    'resolve' => function(\App\Domain\Movie $movie) {
                        return $movie->getRunningTime();
                    }
                ],
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