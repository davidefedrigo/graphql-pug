<?php

namespace App\GraphQL\Resolver;

use App\Domain\Movie;
use App\GraphQL\Type\Enum\Language;

class MovieResolver
{
    public static function title() {
        return function (Movie $movie, $args) {
            $language = isset($args['language']) ? $args['language'] : null;
            if ($language === Language::ITALIAN) {
                $title = $movie->getItalianTitle();
            } else {
                $title = $movie->getEnglishTitle();
            }

            return $title;
        };
    }

}