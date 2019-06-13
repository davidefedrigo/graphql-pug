<?php

namespace App\Application;

use App\Domain\Actor;
use App\Domain\Movie;
use Functional as F;

class Movies
{
    /**
     * @return array
     */
    public static function getAll(): array
    {
        return [
            Movie::create(1, "Back to the Future", "Ritorno al Futuro", 1985, 116),
            Movie::create(2, "Back to the Future Part II", "Ritorno al futuro - Parte II", 1989, 108),
            Movie::create(3, "Spider-Man", "Spider-Man", 2002, 121),
            Movie::create(4, "Avengers: Endgame", "Avengers: Endgame", 2019, 181)
        ];
    }

    /**
     * @param $matching
     * @return array
     */
    public static function search($matching): array
    {
        return F\filter(self::getAll(), function(Movie $movie) use ($matching) {
            return stripos($movie->getEnglishTitle(), $matching) !== false ||
                stripos($movie->getItalianTitle(), $matching) !== false;
        });
    }

    /**
     * @param int $year
     * @return array
     */
    public function find(?int $year): array
    {
        $movies = self::getAll();
        if (!is_null($year)) {
            $movies = F\filter($movies, function(Movie $movie) use ($year) {
                return $movie->getYear() === $year;
            });
        }

        return $movies;
    }

    public function byActor(Actor $actor): array
    {
        return [];
    }
}