<?php

namespace App\GraphQL\Type;

use App\GraphQL\Resolver\TvSeriesResolver;
use App\GraphQL\TypeRegistry;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class TvSeries extends ObjectType
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
                    'resolve' => TvSeriesResolver::title()
                ],
                'seasons' => [
                    'type' => Type::listOf(TypeRegistry::season()),
                    'resolve' => function(\App\Domain\TvSeries $tvSeries) {
                        return $tvSeries->getSeasons();
                    }
                ],
            ],

        ];
        parent::__construct($config);
    }
}