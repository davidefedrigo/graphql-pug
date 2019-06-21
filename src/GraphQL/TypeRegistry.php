<?php

namespace App\GraphQL;

use App\GraphQL\Type\Actor;
use App\GraphQL\Type\Director;
use App\GraphQL\Type\Enum\Language;
use App\GraphQL\Type\Movie;

class TypeRegistry
{
    private static $actor;
    private static $movie;
    private static $director;
    private static $language;

    public static function movie()
    {
        return self::$movie ?: (self::$movie = new Movie());
    }

    public static function director()
    {
        return self::$director ?: (self::$director = new Director());
    }

    public static function actor()
    {
        return self::$actor ?: (self::$actor = new Actor());
    }

    public static function language()
    {
        return self::$language ?: (self::$language = new Language());
    }
}