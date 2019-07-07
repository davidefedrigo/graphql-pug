<?php

namespace App\GraphQL\Type;

use App\Domain\Movie;
use App\Domain\TvSerie;
use App\GraphQL\TypeRegistry;
use GraphQL\Type\Definition\UnionType;

class SearchResult extends UnionType
{
    public function __construct()
    {
        $config = [
            'types' => [
                TypeRegistry::movie(),
                TypeRegistry::tvSerie()
            ],
            'resolveType' => function($value) {
                if ($value instanceof Movie) {
                    return TypeRegistry::movie();
                } elseif ($value instanceof TvSerie) {
                    return TypeRegistry::tvSerie();
                }
            }
        ];
        parent::__construct($config);
    }
}