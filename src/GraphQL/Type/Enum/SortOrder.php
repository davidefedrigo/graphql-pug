<?php

namespace App\GraphQL\Type\Enum;

use GraphQL\Type\Definition\EnumType;

class SortOrder extends EnumType
{
    const ASC = 'ASC';
    const DESC = 'DESC';

    public function __construct()
    {
        $config = [
            'name' => 'SortOrder',
            'values' => [self::ASC, self::DESC]
        ];
        parent::__construct($config);
    }
}