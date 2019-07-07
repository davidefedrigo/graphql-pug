<?php

namespace App\GraphQL\Type;

use App\Application\Actors;
use App\Domain\Language;
use App\GraphQL\Resolver\TvSerieResolver;
use App\GraphQL\Type\Enum\Language as LanguageType;
use App\GraphQL\TypeRegistry;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class TvSerie extends ObjectType
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
                    'resolve' => TvSerieResolver::title()
                ],
                'seasons' => [
                    'type' => Type::listOf(TypeRegistry::season()),
                    'resolve' => function(\App\Domain\TvSerie $tvserie) {
                        return $tvserie->getSeasons();
                    }
                ],
            ],

        ];
        parent::__construct($config);
    }
}