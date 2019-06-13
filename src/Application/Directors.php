<?php

namespace App\Application;

use App\Domain\Actor;
use App\Domain\Director;
use App\Domain\Movie;

class Directors
{
    public static function getAll(): array
    {
        return [
            Director::create(1, "Steven Spielberg", "Ohio, USA"),
            Director::create(2, "Quentin Tarantino", "Tennessee, USA"),
            Director::create(3, "Tim Burton", "California, USA")
        ];
    }

    public function byCountry($country): array
    {
        return [];
    }
}