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
            Movie::create(1, "Back to the Future", "Ritorno al Futuro", 1985),
            Movie::create(2, "Back to the Future Part II", "Ritorno al futuro - Parte II", 1989),
            Movie::create(3, "Spider-Man", "Spider-Man", 2002)
        ];
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