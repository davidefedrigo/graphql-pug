<?php

namespace App\GraphQL\Resolver;

use App\Domain\TvSerie;
use App\GraphQL\Type\Enum\Language;

class TvSerieResolver
{
    public static function title() {
        return function (TvSerie $tvSerie, $args) {
            $language = isset($args['language']) ? $args['language'] : null;
            if ($language === Language::ITALIAN) {
                $title = $tvSerie->getItalianTitle();
            } else {
                $title = $tvSerie->getEnglishTitle();
            }

            return $title;
        };
    }

}