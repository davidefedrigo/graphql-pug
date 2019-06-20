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
            Movie::create(2, "Back to the Future Part II", 1989)
        ];
    }

    public function byActor(Actor $actor): array
    {
        return [];
    }
}