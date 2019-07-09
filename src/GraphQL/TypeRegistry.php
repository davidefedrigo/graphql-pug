<?php

namespace App\GraphQL;

use App\GraphQL\Type\Actor;
use App\GraphQL\Type\Director;
use App\GraphQL\Type\Enum\Language;
use App\GraphQL\Type\Episode;
use App\GraphQL\Type\Movie;
use App\GraphQL\Type\SearchResult;
use App\GraphQL\Type\Season;
use App\GraphQL\Type\TvSeries;

class TypeRegistry
{
    private static $actor;
    private static $movie;
    private static $tvSeries;
    private static $season;
    private static $episode;
    private static $director;
    private static $language;
    private static $searchResult;

    public static function movie()
    {
        return self::$movie ?: (self::$movie = new Movie());
    }

    public static function tvSeries()
    {
        return self::$tvSeries ?: (self::$tvSeries = new TvSeries());
    }

    public static function season()
    {
        return self::$season ?: (self::$season = new Season());
    }

    public static function episode()
    {
        return self::$episode ?: (self::$episode = new Episode());
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

    public static function searchResult()
    {
        return self::$searchResult ?: (self::$searchResult = new SearchResult());
    }
}