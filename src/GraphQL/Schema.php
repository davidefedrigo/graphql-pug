<?php

namespace App\GraphQL;

use App\GraphQL\Type\Query;

class Schema extends \GraphQL\Type\Schema
{
    public function __construct()
    {
        parent::__construct([
            'query' => new Query()
        ]);
    }
}