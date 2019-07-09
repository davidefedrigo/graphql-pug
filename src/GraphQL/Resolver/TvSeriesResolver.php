<?php

namespace App\GraphQL\Resolver;

use App\Domain\TvSeries;
use App\GraphQL\Type\Enum\Language;

class TvSeriesResolver
{
    public static function title() {
        return function (TvSeries $tvSeries, $args) {
            $language = isset($args['language']) ? $args['language'] : null;
            if ($language === Language::ITALIAN) {
                $title = $tvSeries->getItalianTitle();
            } else {
                $title = $tvSeries->getEnglishTitle();
            }

            return $title;
        };
    }

}