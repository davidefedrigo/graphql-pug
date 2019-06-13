<?php

namespace App\Application;


class Catalogue
{
    /**
     * @param $matching
     * @return array
     */
    public static function search($matching)
    {
        return array_merge(
            Movies::search($matching),
            TvSeries::search($matching)
        );
    }
}