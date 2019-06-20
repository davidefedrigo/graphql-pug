<?php

namespace App\GraphQL;

use App\GraphQL\Type\Director;
use App\GraphQL\Type\Movie;

class TypeRegistry
{
    private static $movie;
    private static $director;

    public static function movie()
    {
        return self::$movie ?: (self::$movie = new Movie());
    }

    public static function director()
    {
        return self::$director ?: (self::$director = new Director());
    }
}