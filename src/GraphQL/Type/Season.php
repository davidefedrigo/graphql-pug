<?php

namespace App\GraphQL\Type;

use App\GraphQL\TypeRegistry;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class Season extends ObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => [
                'episodes' => [
                    'type' => Type::listOf(TypeRegistry::episode()),
                    'resolve' => function(\App\Domain\Season $season) {
                        return $season->getEpisodes();
                    }
                ],
            ],

        ];
        parent::__construct($config);
    }
}