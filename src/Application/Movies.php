<?php

namespace App\Application;

use App\Domain\Actor;
use App\Domain\Movie;

class Movies
{
    public static function getAll(): array
    {
        return [
            Movie::create(1, "Back to the Future", 1985),
            Movie::create(2, "Back to the Future Part II", 1989),
            Movie::create(3, "Spider-Man", 2002)
        ];
    }

    public function find($movieFilter, $sortOrder): array
    {
        return self::getAll();
    }

    public function byActor(Actor $actor): array
    {
        return [];
    }
}