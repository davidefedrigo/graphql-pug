<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class Episode extends ObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => [
                'runningTime' => [
                    'type' => Type::int(),
                    'resolve' => function(\App\Domain\Episode $episode) {
                        return $episode->getRunningTime();
                    }
                ],
            ],

        ];
        parent::__construct($config);
    }
}