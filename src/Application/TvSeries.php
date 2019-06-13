<?php

namespace App\Application;

use App\Domain\Episode;
use App\Domain\Season;
use Functional as F;

class TvSeries
{
    /**
     * @return array
     */
    public static function getAll(): array
    {
        return [
            \App\Domain\TvSeries::create(1, "Game of Thrones", "Il Trono di spade", [new Season([new Episode(62), new Episode(56)])]),
            \App\Domain\TvSeries::create(1, "Breaking Bad", "Breaking Bad", [new Season([new Episode(58), new Episode(48)])]),
        ];
    }

    /**
     * @param $matching
     * @return array
     */
    public static function search($matching): array
    {
        return F\filter(self::getAll(), function(\App\Domain\TvSeries $movie) use ($matching) {
            return stripos($movie->getEnglishTitle(), $matching) !== false ||
                stripos($movie->getItalianTitle(), $matching) !== false;
        });
    }
}