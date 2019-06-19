<?php

namespace App\GraphQL;

use App\GraphQL\Type\Actor;
use App\GraphQL\Type\Movie;

class TypeRegistry
{
    private static $movie;
    private static $actor;

    public static function movie()
    {
        return self::$movie ?: (self::$movie = new Movie());
    }
}