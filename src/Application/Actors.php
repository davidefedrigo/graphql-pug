<?php

namespace App\Application;

use App\Domain\Actor;
use App\Domain\Movie;
use Functional as F;

class Actors
{
    public static function getAll(): array
    {
        return [
            Actor::create(1, "Michael J. Fox", [1, 2]),
            Actor::create(2, "Christopher Lloyd", [1, 2]),
            Actor::create(3, "Tobey Maguire", [3]),
        ];
    }

    /**
     * @param $string
     * @return array
     */
    public static function getAllMatching(string $string): array
    {
        return F\filter(self::getAll(), function(Actor $actor) use ($string) {
            return stripos($actor->name, $string) !== false;
        });
    }

    public static function findByMovie(Movie $movie): array
    {
        return F\filter(self::getAll(), function(Actor $actor) use ($movie) {
            return in_array($movie->getId(), $actor->movieIds, true);
        });
    }
}