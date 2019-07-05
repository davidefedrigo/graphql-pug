<?php

namespace App\GraphQL\Type;

use App\Application\Actors;
use App\Domain\Language;
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
                    'resolve' => function (\App\Domain\Movie $movie, $args) {
                        $language = isset($args['language']) ? $args['language'] : null;
                        if ($language === LanguageType::ITALIAN) {
                            $title = $movie->getItalianTitle();
                        } else {
                            $title = $movie->getEnglishTitle();
                        }

                        return $title;
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