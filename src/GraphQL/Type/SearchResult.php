<?php

namespace App\GraphQL\Type;

use App\Domain\Movie;
use App\Domain\TvSeries;
use App\GraphQL\TypeRegistry;
use GraphQL\Type\Definition\UnionType;

class SearchResult extends UnionType
{
    public function __construct()
    {
        $config = [
            'types' => [
                TypeRegistry::movie(),
                TypeRegistry::tvSeries()
            ],
            'resolveType' => function($value) {
                if ($value instanceof Movie) {
                    return TypeRegistry::movie();
                } elseif ($value instanceof TvSeries) {
                    return TypeRegistry::tvSeries();
                }
            }
        ];
        parent::__construct($config);
    }
}