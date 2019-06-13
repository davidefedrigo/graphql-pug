<?php

namespace App\GraphQL\Type\Enum;

use GraphQL\Type\Definition\EnumType;

class Language extends EnumType
{
    const ENGLISH = 'ENGLISH';
    const ITALIAN = 'ITALIAN';

    public function __construct()
    {
        $config = [
            'name' => 'Language',
            'values' => [self::ENGLISH, self::ITALIAN]
        ];
        parent::__construct($config);
    }
}